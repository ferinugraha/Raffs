@extends('layouts.home')

@section('title', 'Halaman Order Kamu')

@section('content')

@if (Session::has('cart'))

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<form action="{{ route('checkout.user') }}" method="post">
   @csrf

   @method('POST')
   <section class="shopping-cart-container">
      <section class="order" id="order">
         <h3 class="title">Pemesanan Anda</h3>

         <div class="buy-container">
            <div class="icons border">
               <div class="flex">
                  <div class="inputBox">
                     <span>Nama Pemesan</span>
                     <input type="text" placeholder="Tuliskan Nama " name="name"  class="name" />
                  </div>
                  <div class="inputBox">
                     <span>Nomor Pemesan</span>
                     <input type="number" placeholder="Tuliskan Nomor HP"  name="phone_number" class="name" required />
                  </div>
                  <div class="inputBox">
                     <span>Nomor Meja</span>
                     <input type="number" placeholder="Tuliskan No Meja"  name="no_meja" class="name" required />
                  </div>
               </div>
            </div>
      
            <div class="icons">
               <div class="box">
                  <h3 class="subtotal">Total Harga ({{ $cart->totalQty }}) Produk</span></h3>
                  <h3 class="total">Rp. <span>
                     <?= number_format($cart->totalPrice) ?></span></h3>

                  <button class="btn" type="submit">Bayar Langsung</button>
                  <button class="btn" id="Pay_Button">Bayar</button>
                  <div style="opacity:0;z-index:-1;background:rgba(128,128,128,0.5);position:absolute;top:0px;left:0px;right:0px;bottom:0px;"id="Popup_Backlayer">
                     <div style="width:500px;height:500px;margin-left:auto;margin-right:auto;margin-top:calc((100vh - 500px) / 2);">
                        <button style="height:20px;margin-top:-20px;float:right"id="Close_Button">Tutup</button>
                        <iframe id="Payment_Iframe"style="width:100%;height:100%;"></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <div class="products-container">
         <div class="box-container">

            @foreach ($menus as $key => $menu)

               <div class="box">
                  <a href="{{ route('remove.order', ['id' => $key ]) }}">
                     <i class="fas fa-times"></i>
                  </a>
                  <img src="{{ asset('uploads/produks/'.$menu['item']['image'] ) }}" alt="" />
                  <div class="content">
                     <h3>{{ $menu['item']['product_name'] }}</h3>
                     <span> Level : </span>
                     <input type="number" value="{{ $menu['customer_request']['level']}}" id="" readonly>
                     <br />
                     <span> Rp. </span>
                     <span class="price">  <?= number_format($menu['item']['price']) ?> </span>
                  </div>
               </div>
         
            @endforeach 

         </div>
      
      </div>

   </section>

</form>


@else

   <section class="shopping-cart-container">
      <div class="products-container">
         <h3 class="title">your products</h3>

         <div class="box-container">

            <h1 style="text-align:center;">Belum Ada Produk!</h1>

         </div>
      
      </div>
   </section>

@endif

<script>
   //Tangkap "Payment_Url" Jika Sudah Pernah Dibuat Sebelumnya.
   let Payment_Url;
   //Jika Tombol Bayar Diklik, Maka...
   document.getElementById("Pay_Button").addEventListener("click",(event)=>{
       //...Prevent Devault Untuk Mencegah Error 503, Dan...
      event.preventDefault();
      //...Jalankan Fungsi "Launch_Payment_Process".
      Launch_Payment_Process();});
   //Jika Fungsi "Launch_Payment_Process" Terpanggil, Maka...
   const Launch_Payment_Process=async()=>{
       //Jika "Payment_Url" Sudah Pernah Dibuat Sebelumnya, Maka Skip. Namun Jika Belum...
      if(!Payment_Url){ 
         // setup invoice data
         const Payment_Detail={
            currency:"IDR",
            amount:<?php if (isset($jumlahppn )){echo $jumlahppn;} ?>,
            // amount:<?php if (isset($cart->totalPrice)){echo $cart->totalPrice;} ?>,
            redirect_url:window.location.origin+"/"};
         // create an invoice for store checkout
         const response=await fetch("/api/invoice",{
            method:"POST",
            headers:{"Content-Type":"application/json;charset=utf-8"},
            body:JSON.stringify(Payment_Detail)});
         const data=await response.json();
         if(response.status>=200&&response.status<=299&&typeof data.invoice_url!=="undefined"){
            Payment_Url=data.invoice_url;
         }}
      document.getElementById("Payment_Iframe").src=Payment_Url;
      document.querySelector("#Popup_Backlayer").style.opacity="1";
      document.querySelector("#Popup_Backlayer").style.zIndex="1";};
      document.querySelector("#Close_Button").addEventListener("click",()=>{
      document.querySelector("#Popup_Backlayer").style.opacity="0";
      document.querySelector("#Popup_Backlayer").style.zIndex="-1";
   });
</script>

@endsection
