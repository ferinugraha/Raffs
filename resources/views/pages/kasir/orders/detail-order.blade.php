@extends('layouts.kasir')

@section('content')
<div id="main">
   <div class="page-heading">
      <div class="page-title">
         <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
               <h3>Data Order Detail</h3>
               <p class="text-subtitle text-muted">For order detail kasir to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
               <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                     <div class="buttons">
                        <a href="{{ route('order.kasir') }}" class="btn btn-primary">Kembali</a>
                     </div>
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
               Data Order Detail
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-lg">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama produk</th>
                           <th>Harga</th>
                           <th>Level</th>
                           <th>Request</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($details as $key => $detail)
                        <tr>
                           <td>{{ ++$key }}</td>
                           <td>{{ $detail['product_name'] }}</td>
                           <td>Rp.
                              <?= number_format($detail['price']) ?>
                           </td>
                           <td>{{ $detail['level'] }}</td>
                           <td>{{ $detail['request'] !== null ? $detail['request'] : 'Tidak ada request' }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>

      </section>
   </div>
</div>
@endsection