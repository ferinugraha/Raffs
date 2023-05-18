@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>History Pembelian</h3>
                    <p class="text-subtitle text-muted">For history to check they list</p>
                </div>
            </div>
        </div>

        @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        <section class="section">
            <div class="card">
                <div class="card-header">
                    History Pembelian
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Nomor Pemesan</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Waktu Pemesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp.
                                    <?= number_format($item->total_price) ?>
                                </td>
                                <td><span class="badge bg-danger">{{ $item->status }}</span></td>
                                <td>{{ $item->created_at->timezone('Asia/Jakarta')->format('F d, Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>
@endsection