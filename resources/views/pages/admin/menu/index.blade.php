@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Menu</h3>
                    <p class="text-subtitle text-muted">For menu to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <div class="buttons">
                                <a href="{{ route('menu.create') }}" class="btn btn-primary">Create</a>
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
                    Data Menu
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>IMG</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <img src="{{ asset('uploads/produks/'.$item->image) }}" width="90px" height="90px" alt="image">
                                </td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->price }}</td>
                                <td width="450"><span
                                        style="display: -webkit-box;-webkit-line-clamp: 2;overflow: hidden;-webkit-box-orient: vertical;">{{
                                        $item->description }}</span></td>
                                <td>
                                    <form action="{{ route('menu.destroy',$item->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('menu.edit',$item->id) }}" style="width: 100px; margin-bottom:5px;">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="width: 100px;">Delete</button>
                                    </form>
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