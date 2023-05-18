@extends('layouts.kasir')
@section('content')
<div id="main">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Data Menu</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <div class="buttons">
                            <a href="{{ route('menu.menukasir') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Menu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('menu.updatemenukasir' , $menu->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @method('GET')

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Name Menu</label>
                                            <input type="text" name="product_name" class="form-control"
                                                placeholder="Nama Menu" value="{{ $menu->product_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">IMG</label>
                                            <input type="file" name="image" class="form-control" placeholder="Image">
                                            <img src="{{ asset('uploads/produks/'.$menu->image) }}" width="70px"
                                                height="70px" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Harga</label>
                                            <input type="number" name="price" class="form-control" placeholder="Harga"
                                                value="{{ $menu->price }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Deskripsi</label>
                                            <textarea name="description" class="form-control" cols="30" rows="4"
                                                required>{{ $menu->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection