@extends('layouts.home')

@section('title', 'Beranda')

@section('content')

<section class="home" id="home">
    <div class="content">
        <span>welcome {{ $profile->title }}</span>
        <h3>{{ $profile->title_homemenu }}</h3>
        {{-- <h3>different spices for the different tastes 😋</h3> --}}
        <p>{{ $profile->description_homemenu }}</p>
        <a href="#menu" class="btn">order now</a>
    </div>

    <div class="image">
        <img src="{{ asset('assets/home/image/home-img.png') }}" alt="" class="home-img" />
        <img src="{{ asset('assets/home/image/home-parallax-img.png') }}" alt="" class="home-parallax-img" />
    </div>
</section>

<section class="about" id="about">
    <div class="image">
        <img src="{{ asset('img_navbar/' . $profile->img_navbar) }}" alt="" />
    </div>

    <div class="content">
        <span>why choose us?</span>
        <h3 class="title">{{ $profile->title_navbar }}</h3>
        <p>{{ $profile->title_description }}</p>
        <a href="#" class="btn">read more</a>
        <div class="icons-container">
            <div class="icons">
                <img src="{{ asset('assets/home/image/serv-2.png') }}" alt="" />
                <h3>fresh food</h3>
            </div>
            <div class="icons">
                <img src="{{ asset('assets/home/image/serv-3.png') }}" alt="" />
                <h3>best quality</h3>
            </div>
        </div>
    </div>
</section>

<section class="popular" id="menu">
    <div class="heading">
        <span>popular food</span>
        <h3>our special dishes</h3>
    </div>

    <div class="box-container">
        @forelse ($menu as $item)
        
            <div class="box">
                <div class="image">
                    <img src="{{ asset('uploads/produks/'.$item->image) }}" alt="" />
                </div>
                <div class="content">
                    <h3>{{$item->product_name }}</h3>
                    <br>
                    <div class="price">Rp. {{ $item->price }}/porsi</div>
                    <a href="/detail-product/{{ $item->id }}" class="btn">Lihat Detail</a>
                </div>
            </div>

        @empty

        @endforelse
    </div>
</section>

<section class="banner">
    <div class="row-banner">
        <img src="{{ asset('img_big/'.$profile->img_big) }}" alt="" />
        <div class="content">
            <span>Special Menu</span>
            <h3>{{ $profile->title_big }}</h3>
            <p style="width:410px;">{{ $profile->description_big }}</p>
            <a href="#menu" class="btn">order now</a>
        </div>
    </div>

    <div class="grid-banner">
        <div class="grid">
        <img src="{{ asset('img_left/'.$profile->img_left) }}" alt="" />
        <div class="content ">
            <span>{{ $profile->title_left }}</span>
            <h3>{{ $profile->description_left }}</h3>
            <a href="#menu" class="btn">order now</a>
        </div>
    </div>
    <div class="grid">
    <img src="{{ asset('img_center/'.$profile->img_center) }}" alt="" />
    <div class="content center">
        <span>{{ $profile->title_center }}</span>
        <h3>{{ $profile->description_center }}</h3>
        <a href="#menu" class="btn">order now</a>
    </div>
    </div>
    <div class="grid">
    <img src="{{ asset('img_right/'.$profile->img_right) }}" alt="" />
    <div class="content">
        <span>{{ $profile->title_right }}</span>
        <h3>{{ $profile->description_right }}</h3>
        <a href="#menu" class="btn">order now</a>
    </div>
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
        </div>
    </div>

    <form action="">
        <div class="flex">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d135622.9444244895!2d106.63595063996318!3d-6.2855979163288564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef438d8d95df%3A0x302069d5111d3ba1!2sRAFFS%20Coffee%20%26%20Clothing!5e0!3m2!1sid!2sid!4v1672763275917!5m2!1sid!2sid" class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </form>
</section>


@endsection