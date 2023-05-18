@extends('layouts.admin')
@section('content')
<div id="main">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <div class="buttons">
                            <a href="{{ route('profile.index') }}" class="btn btn-primary">Kembali</a>
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
                        <h4 class="card-title">Edit Website</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('profile.update' , $profile->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <h4 class="card-title mb-3">Logo & Title Website</h4>

                                        <div class="form-group">
                                            <label for="city-column">Title Website</label>
                                            <input type="text" name="title" class="form-control" value="{{ $profile->title }}" placeholder="Title" >
                                        </div>

                                        <div class="form-group">
                                            <label for="city-column">Title Website</label>
                                            <input type="file" name="image" class="form-control mb-1" placeholder="" >
                                            <img src="{{ asset('image/'.$profile->image) }}" width="130px" height="120px" style="border-radius:10px;" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="city-column">Title Website</label>
                                            <input type="file" name="title_image" class="form-control mb-1" placeholder="" >
                                            <img src="{{ asset('title_image/'.$profile->title_image) }}" width="130px" height="120px" style="border-radius:10px;" alt="image">
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-12">
                                        <h4 class="card-title mb-3">IMG & Title Wellcome Website</h4>

                                        <div class="form-group">
                                            <label for="city-column">Title Bar</label>
                                            <input type="text" name="title_navbar" class="form-control" value="{{ $profile->title_navbar }}" placeholder="Title" >
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Desktipsi Bar</label>
                                            <textarea name="title_description" id="" class="form-control" cols="34" rows="15">{{ $profile->title_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="city-column">IMG Bar</label>
                                        <input type="file" name="img_navbar" class="form-control mb-2" placeholder="Title">
                                        <img src="{{ asset('img_navbar/'.$profile->img_navbar) }}" width="300" height="260" style="border-radius:10px;" alt="image">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <h4 class="card-title mb-3">IMG & Landing Page Home Menu</h4>

                                        <div class="form-group">
                                            <label for="city-column">Title Landing</label>
                                            <input type="text" name="title_homemenu" class="form-control" value="{{ $profile->title_homemenu }}" placeholder="Title" >
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Desktipsi Landing</label>
                                            <textarea name="description_homemenu" id="" class="form-control" cols="34" rows="15">{{ $profile->description_homemenu }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label for="city-column">IMG Landing</label>
                                        <input type="file" name="img_homemenu" class="form-control mb-2" placeholder="Title">
                                        <img src="{{ asset('img_homemenu/'.$profile->img_homemenu) }}" width="300" height="260" style="border-radius:10px;" alt="image">
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <label for="city-column">Cover IMG Landing</label>
                                        <input type="file" name="cover_img_homemenu" class="form-control mb-2" placeholder="Title">
                                        <img src="{{ asset('cover_img_homemenu/'.$profile->cover_img_homemenu) }}" width="300" height="260" style="border-radius:10px;" alt="image">
                                    </div>

                                </div>

                                <h4 class="card-title mt-4">Banner Produk</h4>

                               
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Big Banner</label>
                                            <input type="file" name="img_big" class="form-control mb-2" placeholder="" >
                                            <img src="{{ asset('img_big/'.$profile->img_big) }}" width="100%" height="200px" style="border-radius:10px" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Title Big Banner</label>
                                            <input type="text" name="title_big" value="{{ $profile->title_big }}" class="form-control" placeholder="Title" >
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Deskripsi Big Banner</label>
                                            <input type="text" name="description_big" class="form-control" value="{{ $profile->description_big }}" placeholder="Deskripsi" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Left Banner</label>
                                            <input type="file" name="img_left" class="form-control mb-2" placeholder="" >
                                            <img src="{{ asset('img_left/'.$profile->img_left) }}" width="100%" height="160px" style="border-radius:10px" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Title Left Banner</label>
                                            <input type="text" name="title_left" value="{{ $profile->title_left }}" class="form-control" placeholder="" >
                                        </div>
                                        <div class="form-group">
                                            <label for="last-name-column">Description Left Banner</label>
                                            <input type="text" name="description_left" value="{{ $profile->description_left }}" class="form-control" placeholder="" >
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Center Banner</label>
                                            <input type="file" name="img_center" class="form-control mb-2" placeholder="" >
                                            <img src="{{ asset('img_center/'.$profile->img_center) }}" width="100%" height="160px" style="border-radius:10px" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Title Center Banner</label>
                                            <input type="text" name="title_center" value="{{ $profile->title_center }}" class="form-control" placeholder="" >
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Description Center Banner</label>
                                            <input type="text" name="description_center" value="{{ $profile->description_center }}" class="form-control" placeholder="" >
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Right Banner</label>
                                            <input type="file" name="img_right" class="form-control mb-2" placeholder="" >
                                            <img src="{{ asset('img_right/'.$profile->img_right) }}" width="100%" height="160px" style="border-radius:10px" alt="image">
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Title Right Banner</label>
                                            <input type="text" name="title_right" class="form-control" value="{{ $profile->title_right }}" placeholder="" >
                                        </div>

                                        <div class="form-group">
                                            <label for="last-name-column">Description Right Banner</label>
                                            <input type="text" name="description_right" value="{{ $profile->description_right }}" class="form-control" placeholder="" >
                                        </div>

                                    </div>

                                </div>

                                <h4 class="card-title mt-4">Contact & Address</h4>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Time Open</label>
                                            <input type="time" name="time_open" value="{{ $profile->time_open }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Time Close</label>
                                            <input type="time" name="time_close" class="form-control" value="{{ $profile->time_close }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">No Telp</label>
                                            <input type="number" name="no_telp" class="form-control" value="{{ $profile->no_telp }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{ $profile->address }}" placeholder="Sawangan, Depok - Indonesia">
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