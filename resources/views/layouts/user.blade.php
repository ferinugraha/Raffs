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
            <a href="/Pesanan-anda">
               <div id="cart-btn" class="fas fa-shopping-cart"><span style="font-size:18px; padding-left:3px;">{{Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></div>
            </a>

            <a href="/logout">
               <div class="fas">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="5 -2 16 16">
                     <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                     <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                   </svg>
               </div>
               {{-- <div class="fas fa-user"></div> --}}
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
      
            <div class="box">
               <h3>extra links</h3>
               <a href="#"> <i class="fas fa-arrow-right"></i> my order</a>
               <a href="#"> <i class="fas fa-arrow-right"></i> my account</a>
               <a href="#"> <i class="fas fa-arrow-right"></i> my favorite</a>
               <a href="#"> <i class="fas fa-arrow-right"></i> terms of use</a>
               <a href="#"> <i class="fas fa-arrow-right"></i> privary policy</a>
            </div>
      
            <div class="box">
               <h3>opening hours</h3>
               <p>monday : 7:00am to 10:00pm</p>
               <p>tuesday : 7:00am to 10:00pm</p>
               <p>wednesday : 7:00am to 10:00pm</p>
               <p>friday : 7:00am to 10:00pm</p>
               <p>saturday and sunday closed</p>
            </div>
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