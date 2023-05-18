@extends('layouts.user')

@section('title', 'Halaman Order Kamu')

@section('content')

   <section class="about" id="about">
      <div class="image">
         <img src="{{ asset('uploads/produks/'.$product->image) }}" alt="" />
      </div>

      <div class="content">
         <h3 class="title">{{ $product->product_name }}</h3>
         <span style="font-size:20px;">Rp. <?= number_format( $product->price ) ?> /Porsi</span>
         <p>{{ $product->description }}</p>
         <div class="icons">
            <form action="{{ route('tambah-orderan', ['id' => $product->id]) }}" method="post">
               @csrf
                  <div>
                     <span style="font-size:20px;">Level</span>
                     <select style="border:1px solid gray; border-radius:5px;" name="level" aria-label="Default select menu">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                     </select>
                     <span style="font-size:20px; float:right;">Tersedia</span>
                  </div>
                  <br>
                  <div>
                     <textarea  name="request" placeholder="Request Pesanan Anda" style="height: 70px; border: 1px solid gray; padding:10px; width:100%; resize: none;"></textarea>
                  </div>

                  <button type="submit" class="btn">Tambah Order</button>
            </form>
         </div>
      </div>
   </section>


@endsection