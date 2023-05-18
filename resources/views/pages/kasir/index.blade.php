@extends('layouts.kasir')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Halaman Kasir</h3>
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
                    <div class="col-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Pesanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Nama Pemesan</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $order = DB::table('orders')->where('status', 'active')->get();
                                                if ($order) {
                                            ?>
                                                @foreach ($order as $item)
                                                <tr>
                                                    <td>
                                                        <img src="/assets/images/faces/2.jpg" alt="Face 1" style="width:50px; height:50px; border-radius:50%;">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>Rp.
                                                        <?= number_format($item->total_price) ?>
                                                    </td>
                                                    <td><a class="btn btn-info" href="{{ route('order-detail.kasir', ['id' => $item->id]) }}">Detail</a></td>
                                                </tr>
                                                @endforeach
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="4" style="font-size: 13px; color:gray; text-align:center;">Pemesanan Kosong</td>
                                                </tr>
                                            <?php } ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
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
                            <img src="/assets/images/faces/7.jpg" alt="Face 1">
                        </div>

                        <div class="mt-3 name">
                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</div> 

@endsection
