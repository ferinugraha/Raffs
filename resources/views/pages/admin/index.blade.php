@extends('layouts.admin')

@section('content')


<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <body>
    <div class="page-heading">
        <h3>Halaman Admin</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                            $menu_counts = DB::table('menu')->count();    
                                        ?>
                                        <h6 class="text-muted font-semibold">Menu</h6>
                                        <h6 class="font-extrabold mb-0">{{ $menu_counts }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                            $account_counts = DB::table('users')->wherein('role', ['Admin','Kasir'])->count();    
                                        ?>
                                        <h6 class="text-muted font-semibold">Account </h6>
                                        <h6 class="font-extrabold mb-0">{{ $account_counts }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                            $user_counts = DB::table('users')->where('role', 'User')->count();    
                                        ?>
                                        <h6 class="text-muted font-semibold">Account User</h6>
                                        <h6 class="font-extrabold mb-0">{{ $user_counts }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jumlah Pemesanan</h4>
                            </div>
                            <div class="card-body" id="chart">
                                <div style="width:100%">
                                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                                    {!! $chart1->renderHtml() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card" id="chart">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <?php
                                    $pesanan_counts = DB::table('orders')->where('status', 'Active')->count();    
                                ?>
                                <h6 class="text-muted font-semibold">Pesanan</h6>
                                <h6 class="font-extrabold mb-0">{{ $pesanan_counts }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                   
                    <div class="card-body">
                        <div class="avatar avatar-xl">
                            <img src="/assets/images/faces/2.jpg" alt="Face 1">
                        </div>

                        <div class="mt-3 name">
                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mb-0"  style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; ">{{ Auth::user()->email }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</div> 
</body>
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
   
</script>

<style>

#chart {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto; /* Enable horizontal scrolling */
  overflow-y: hidden; /* Hide vertical scrolling */
  white-space: nowrap; /* Prevent line breaks */
}

    </style>

</html>
@endsection
