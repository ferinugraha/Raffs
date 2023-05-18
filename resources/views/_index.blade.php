@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<section class="about" id="home">
   <div class="image">
      <img src="{{ asset('img_navbar/'.$profile->img_navbar) }}">
   </div>

   <div class="content">
      <span>Welcome {{ $profile->title }}</span>
      <h3 class="title">{{ $profile->title_navbar }}</h3>
      <p>{{ $profile->title_description }}</p>
      <a href="#" class="btn">read more</a>
      <div class="icons-container">
         <a href="https://gofood.link/a/BzGeXAm" target="blank" class="icons">
         {{-- <a href="{{ route('login.index') }}" class="icons"> --}}
            <img src="{{ asset('assets/home/image/serv-1.png') }}" alt="" />
            <h3>Delivery</h3>
         </a>
         
         <a href="{{ route('product.index') }}" class="icons">
            <img src="{{ asset('assets/home/image/serv-2.png') }}" alt="" />
            <h3>Dine-in</h3>
         </a>
      </div>
   </div>
</section>

<section class="order" id="order">
   <div class="heading">
      <span>order now</span>
      <h3>fastest home delivery</h3>
   </div>

   <div class="icons-container">
      <div class="icons">
         <img src="{{ asset('assets/home/image/icon-1.png') }}" alt="" />
         <h3>{{ $profile->time_open }} AM to {{ $profile->time_close }} PM</h3>
      </div>

      <div class="icons">
         <img src="{{ asset('assets/home/image/icon-2.png') }}" alt="" />
         <h3>{{ $profile->no_telp }}</h3>
      </div>

      <div class="icons">
         <img src="{{ asset('assets/home/image/icon-3.png') }}" alt="" />
         <h3>{{ $profile->address }} </h3>
         {{-- <h3>Sawangan, Depok - Indonesia </h3> --}}
         </div>
   </div>

   <form action="">
      <div class="flex">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d135622.9444244895!2d106.63595063996318!3d-6.2855979163288564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef438d8d95df%3A0x302069d5111d3ba1!2sRAFFS%20Coffee%20%26%20Clothing!5e0!3m2!1sid!2sid!4v1672763275917!5m2!1sid!2sid" class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
   </form>
</section>

@endsection