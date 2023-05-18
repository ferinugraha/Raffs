@extends('layouts.admin')
@section('content')
<div id="main">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Profile Website</h3>
                <p class="text-subtitle text-muted">For profile to check they list</p>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-content">
                        <div class="card-body">
                            
                            @foreach ($profile as $item)
                                
                            <form class="form" enctype="multipart/form-data">


                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <h4 class="card-title mb-3">Logo & Title Website</h4>

                                        <div class="form-group">
                                            <label for="city-column">Title Website</label>
                                            <input type="text" name="title" class="form-control" value="{{ $item->title }}" placeholder="Title" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Logo Nav & Logo Website</label>
                                            <br>
                                            <img src="{{ asset("image/{$item->image}") }}" width="130px" height="120px" style="border-radius:10px;" alt="image">
                                            <img src="{{ asset('title_image/'.$item->title_image) }}" width="130px" height="120px" style="border-radius:10px;" alt="image">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <h4 class="card-title mb-3">IMG & Title Wellcome Website</h4>

                                        <div class="form-group">
                                            <label for="city-column">Title Bar</label>
                                            <input type="text" name="title" class="form-control" value="{{ $item->title_navbar }}" placeholder="Title" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Desktipsi Bar</label>
                                            <textarea name="" id="" cols="34" rows="5" class="form-control" disabled>{{ $item->title_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <img src="{{ asset('img_navbar/'.$item->img_navbar) }}" width="300" height="260" style="border-radius:10px;" alt="image">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4 col-12">
                                        <h4 class="card-title mb-3">IMG & Landing Page Home Menu</h4>

                                        <div class="form-group">
                                            <label for="city-column">Title Landing</label>
                                            <input type="text" name="title" class="form-control" value="{{ $item->title_homemenu }}" placeholder="Title" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Desktipsi Landing</label>
                                            <textarea name="" id="" cols="34" rows="5" class="form-control" disabled>{{ $item->description_homemenu }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <img src="{{ asset('img_homemenu/'.$item->img_homemenu) }}" width="300" height="260" style="border-radius:10px;" alt="image">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <img src="{{ asset('cover_img_homemenu/'.$item->cover_img_homemenu) }}" width="300" height="260" style="border-radius:10px;" alt="image">
                                    </div>

                                </div>

                                <h4 class="card-title mt-4">Banner Produk</h4>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Big Banner</label>
                                            <img src="{{ asset('img_big/'.$item->img_big) }}" width="100%" height="250px" style="border-radius:10px" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Title Big Banner</label>
                                            <input type="text" name="title" value="{{ $item->title_big }}" class="form-control" placeholder="Title" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Deskripsi Big Banner</label>
                                            <input type="text" name="description" value="{{ $item->description_big }}" class="form-control" placeholder="Deskripsi" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Left Banner</label>
                                            <img src="{{ asset('img_left/'.$item->img_left) }}" width="100%" height="250px" style="border-radius:10px" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Left Title Banner</label>
                                            <input type="text" name="title" value="{{ $item->title_left }}" class="form-control" placeholder="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="last-name-column">Left Description Banner</label>
                                            <input type="text" name="title" value="{{ $item->description_left }}" class="form-control" placeholder="" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">  Center Banner</label>
                                            <img src="{{ asset('img_center/'.$item->img_center) }}" width="100%" height="250px" style="border-radius:10px" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Center Title Bannder</label>
                                            <input type="text" name="title" class="form-control" value="{{ $item->title_center }}"  placeholder="" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Center Description Banner</label>
                                            <input type="text" name="title" value="{{ $item->description_center }}" class="form-control" placeholder="" readonly>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Big Banner</label>
                                            <img src="{{ asset('img_right/'.$item->img_right) }}" width="100%" height="250px" style="border-radius:10px" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Banner</label>
                                            <input type="text" name="title" class="form-control"  value="{{ $item->title_right }}"  placeholder="" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Banner</label>
                                            <input type="text" name="title" class="form-control" value="{{ $item->description_right }}" placeholder="" readonly>
                                        </div>

                                    </div>

                                </div>

                                <h4 class="card-title mt-4">Contact & Address</h4>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Time Open</label>
                                            <input type="time" name="" class="form-control"  value="{{ $item->time_open }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Time Close</label>
                                            <input type="time" name="" class="form-control" value="{{ $item->time_close }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">No Telp</label>
                                            <input type="text" name="" class="form-control" value="{{ $item->no_telp }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Address</label>
                                            <input type="text" name="" class="form-control" value="{{ $item->address }}" placeholder="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <a class="btn btn-primary" style="width: 90px; margin:5px;" href="{{ route('profile.edit',$item->id) }}">Edit</a>
                                    </div>
                                </div>
                            </form>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection