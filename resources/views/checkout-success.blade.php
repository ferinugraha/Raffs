<!DOCTYPE html>
<html lang="en">

<?php
   use App\Models\Order;
?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Checkout Success</title>

   {{-- Bootstrap CSS --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   {{-- Google Fonts --}}

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

   {{-- Custom CSS --}}
   <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
   <div class="row d-flex justify-content-center m-auto">
      <div class="col-lg-4">
         <a href="{{ route('product.index') }}" class="btn btn-primary mb-3">
            Kembali </a>
         <div class="card p-4 border-0 shadow rounded">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center pb-2">
                  <h2 class="fs-2 fw-semibold">DETAIL ORDER</h2>
                  <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
               </div>
               <h6 class="card-subtitle mb-3 text-muted fs-6">
                  {{ $order->created_at->timezone('Asia/Jakarta')->format('F d, Y H:i'); }}
               </h6>
               <div class="row">
                  <span class="mb-2">
                     <table>
                        <tr>
                           <td style="padding-right:5px;">Nomor PO</td>
                           <td>:</td>
                           <td style="padding-left:5px;">{{ $order->kode }}</td>
                        </tr>
                        <tr>
                           <td style="padding-right:5px;">Nama</td>
                           <td>:</td>
                           <td style="padding-left:5px;">{{ $order->name }}</td>
                        </tr>
                        <tr>
                           <td style="padding-right:5px;">No. Telp</td>
                           <td>:</td>
                           <td style="padding-left:5px;">{{ $order->phone_number }}</td>
                        </tr>
                        <tr>
                           <td style="padding-right:5px;">No. Meja</td>
                           <td>:</td>
                           <td style="padding-left:5px;">{{ $order->no_meja }}</td>
                        </tr>

                     </table>
                  </span>
               </div>
               <hr>
               <div class="d-flex justify-content-between fs-5 fw-semibold mb-2">
                  <span>Produk</span>
                  <span>Harga</span>
               </div>
               @foreach ($menus as $menu)
               <div class="d-flex justify-content-between fs-6 mb-2">
                  <span>{{ $menu['product_name'] }}</span>
                  <span>Rp.
                     <?= number_format( $menu['price'] ) ?>
                  </span>
               </div>
               @endforeach
               <hr>
               <div class="d-flex justify-content-between fs-6 mb-2">
                  <span>Metode Pembayaran:</span>
                  <span>Di Kasir</span>
               </div>
               <div class="d-flex justify-content-between fs-6 mb-2">
                  <span>Qty:</span>
                  <span>{{ $order->qty }}</span>
               </div>
               <div class="d-flex justify-content-between fs-6 fw-semibold mb-4">
                  <span>Total Belanja:</span>
                  <span>Rp.
                     <?= number_format($order->total_price) ?>
                  </span>
               </div>
               <div class="d-flex justify-content-between fs-6 fw-semibold mb-4">
                  <span>Pajak PPN 10%:</span>
                  <span>Rp.
                     <?= number_format($order->pajak_ppn) ?>
                  </span>
               </div>
               <hr>
               <div class="d-flex justify-content-between fs-6 fw-semibold mb-4">
                  <span>Total:</span>
                  <span>Rp.
                     <?= number_format($order->total) ?>
                  </span>
               </div>
               
            </div>
         </div>
      </div>
   </div>

   {{-- Bootstrap JS --}}
   <script src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
   </script>
</body>

</html>