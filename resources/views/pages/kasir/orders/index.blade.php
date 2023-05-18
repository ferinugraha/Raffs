@extends('layouts.kasir')

@section('content')
<?php
header("Refresh: 10");
?>
<div id="main">
   <div class="page-heading">
      <div class="page-title">
         <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
               <h3>Data Order</h3>
               <p class="text-subtitle text-muted">For order kasir to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
               <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                  </ol>
               </nav>
            </div>
         </div>
      </div>

      @if (session('success'))
      <h6 class="alert alert-success">{{ session('success') }}</h6>
      @endif

      <section class="section">
         <div class="card">
            <div class="card-header">
               Data Order
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
                        <th>PO Order</th>
                        <th>Status</th>
                        <th>Waktu Pemesanan</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($orders as $key => $order)
                     <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>Rp.
                           <?= number_format($order->total_price) ?>
                        </td>
                        <td>{{ $order->kode }}</td>
                        <td><span class="badge bg-success">{{ $order->status }}</span></td>
                        <td>{{ $order->created_at->timezone('Asia/Jakarta')->format('F d, Y H:i') }}</td>
                        <td>
                           <a class="btn btn-danger" style="width:120px; margin-bottom:5px;" href="{{ route('status.update', ['id' => $order->id]) }}">Inactive</a>

                           <a class="btn btn-info" style="width:120px;" href="{{ route('order-detail.kasir', ['id' => $order->id]) }}">Detail
                              Order</a>
                        </td>
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