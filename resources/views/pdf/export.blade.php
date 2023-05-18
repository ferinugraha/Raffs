<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Struk PDF</title>
</head>

<body>
   <h2>DETAIL ORDER</h2>
   <h5>{{ $order->created_at->timezone('Asia/Jakarta')->format('F d, Y H:i'); }}</h5>
   <div>
      <span>Nama: {{ $order->name }}</span>
      <span>No. Telp: {{ $order->phone_number }}</span>
   </div>
   <hr>
   <div>
      <span>Produk</span>
      <span>Harga</span>
   </div>
   @foreach ($menus as $menu)
   <div>
      <span>{{ $menu['product_name'] }}</span>
      <span>Rp.
         <?= number_format($menu['price']) ?>
      </span>
   </div>
   @endforeach
   <hr>
   <div>
      <span>Metode Pembayaran:</span>
      <span>Di Kasir</span>
   </div>
   <div>
      <span>Qty:</span>
      <span>{{ $order->qty }}</span>
   </div>
   <div>
      <span>Total:</span>
      <span>Rp.
         <?= number_format($order->total_price) ?>
      </span>
   </div>
</body>

</html>