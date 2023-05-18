<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Raffs Coffe || Menu</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

   <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}" />
</head>
   <body>
      <header class="header">
         <a href="#" class="logo"> <i class="fas fa-utensils"></i> Raffs Cofee </a>
   
         <nav class="navbar">
            <a href="{{ route('product.index') }}">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#order">order</a>
         </nav>
   
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="/order-kamu">
               <div id="cart-btn" class="fas fa-shopping-cart"><span style="font-size:18px; padding-left:3px;">{{Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></div>
            </a>
         </div>
      </header>
      
      

      @yield('content')
      
      <section class="footer">
         <div class="box-container">
            <div class="box">
               <h3>our menu</h3>
               <a href="#"><i class="fas fa-arrow-right"></i> pizza</a>
               <a href="#"><i class="fas fa-arrow-right"></i> burger</a>
               <a href="#"><i class="fas fa-arrow-right"></i> chicken</a>
               <a href="#"><i class="fas fa-arrow-right"></i> pasta</a>
               <a href="#"><i class="fas fa-arrow-right"></i> and more...</a>
            </div>
      
            <div class="box">
               <h3>quick links</h3>
               <a href="#home"> <i class="fas fa-arrow-right"></i> home</a>
               <a href="#about"> <i class="fas fa-arrow-right"></i> about</a>
               <a href="#menu"> <i class="fas fa-arrow-right"></i> menu</a>
               <a href="#order"> <i class="fas fa-arrow-right"></i> order</a>
            </div>
      
            <?php
               $open = DB::table('profile')->get();
            ?>      
            
            @foreach ($open as $item)
               <div class="box">
                  <h3>opening hours</h3>
                  <p>monday : {{ $item->time_open }} AM to {{ $item->time_close }} PM</p>
                  <p>tuesday : {{ $item->time_open }} AM to {{ $item->time_close }} PM</p>
                  <p>wednesday : {{ $item->time_open }} AM to {{ $item->time_close }} PM</p>
                  <p>friday : {{ $item->time_open }} AM to {{ $item->time_close }} PM</p>
                  <p>saturday : {{ $item->time_open }} AM to {{ $item->time_close }} PM</p>
                  <p>sunday : {{ $item->time_open }} AM to {{ $item->time_close }} PM</p>
               </div>
            @endforeach
           
         </div>
   
         <div class="bottom">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
            </div>
         </div>
      </section>

      <script src="{{ asset('assets/home/js/script.js') }}"></script>
   </body>
</html>