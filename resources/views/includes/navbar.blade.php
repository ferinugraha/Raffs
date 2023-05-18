<nav class="navbar navbar-expand-lg navbar-nav-scroll fixed-top">
   <div class="container py-3">
      <a class="navbar-brand" href="/">
         <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
         aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <ul class="navbar-nav mx-auto">
            <li class="nav-item-md me-4 mb-lg-0 mb-3 nav-text">
               <a class="nav-link" href="#">Chat WhatsApp</a>
            </li>
         </ul>

         <div class="mb-lg-0 mb-3">
            <a href="/login" class="btn-navbar text-center">Masuk</a>
         </div>
      </div>
   </div>
</nav>

{{-- <nav class="navbar navbar-expand-lg navbar-nav-scroll fixed-top">
   <div class="container py-3">
      <a class="navbar-brand" href="/">
         <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
         aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <ul class="navbar-nav mx-auto">
            <li class="nav-item-md me-4 nav-text">
               <a class="nav-link" aria-current="page" href="/">Beranda</a>
            </li>
            <li class="nav-item-md me-4 nav-text">
               <a class="nav-link" href="/order-kamu">Order Kamu <span class="badge text-bg-secondary">{{
                     Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
            </li>
            <li class="nav-item-md me-4 mb-lg-0 mb-3 nav-text">
               <a class="nav-link" href="#">Chat WhatsApp</a>
            </li>
            <div class="nav-animation"></div>
         </ul>

         <div class="mb-lg-0 mb-3">
            <a href="/login" class="btn-navbar text-center">Masuk</a>
         </div>
      </div>
   </div>
</nav> --}}