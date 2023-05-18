@extends('layouts.admin')

@section('content')

<div id="main">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pendapatan Anda</h3>
                    <p class="text-subtitle text-muted">For Pendapatan to check they list</p>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ route('filter.filteradmin') }}" method="GET" id="IdForm">

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Bulan</label>
                                        <div class="input-group">
                                            <select data-plugin="select2" name="Bulan" id="Bulan" class="form-control" required>
                                            <option value="0">Pilih Bulan</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Tahun</label>
                                        <div class="input-group">
                                            <select data-plugin="select2" name="Tahun" id="Tahun" class="form-control" required>
                                                <option value="0">Pilih Tahun</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="2032">2032</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="form-group">
                                        <br>
                                        <button type="submit" class="btn btn-primary me-1 mb-1" onclick="subCari();">
                                            <span class="btn-label"><i class="icon fa-search" aria-hidden="true"></i></span>Search
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <br>
                                        <a href="{{ route('print-pdf', [$bulan , $tahun] ) }}" class="btn btn-danger me-1 mb-1">Export PDF</a>
                                    </div>
                                </div>

                                          
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        <section class="section">
            <div class="card">
                <div class="card-body">
                   
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Nomor Pemesan</th>
                                <th>Qty</th>
                                <th>Waktu Pemesanan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                            ?>
                            @foreach ($order as $key => $item)
                            <?php
                                $total += $item->total_price;
                            ?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->created_at->timezone('Asia/Jakarta')->format('F d, Y H:i') }}</td>
                                <td>Rp.
                                    <?= number_format($item->total_price) ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="4"></th>
                                <th>Pendapatan Anda</th>
                                <th>Rp. <?= number_format($total) ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>

@endsection