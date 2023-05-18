<!doctype html>
<html class="no-js" lang="">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Raffs Coffee | Register </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/font/flaticon.css') }}">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>

   <div id="wrapper" class="wrapper">
      <div class="fxt-template-animation fxt-template-layout13">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-12 order-md-2 fxt-bg-wrap">
                     <div class="fxt-bg-img" data-bg-image="assets/img/file/bn-login.jpg">
                        <div class="fxt-header">
                           <div class="fxt-transformY-50 fxt-transition-delay-2">
                              <h1>Welcome To {{ $profile->title }}</h1>
                           </div>
      
                           <div class="fxt-transformY-50 fxt-transition-delay-3">
                              <p style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden;">
                                 Selamat datang di Caffe, tempat yang sempurna untuk menikmati secangkir kopi yang lezat dan suasana yang nyaman. Nikmati aroma kopi segar kami yang menggoda, sambil menikmati berbagai pilihan hidangan makanan ringan dan kue-kue yang lezat. Dengan layanan ramah dari tim kami, kami berkomitmen untuk memberikan pengalaman kafe yang tak terlupakan bagi setiap tamu. Bersantailah, temui teman-teman, dan rasakan kenikmatan kopi yang kami sajikan di Caffe. Selamat menikmati!
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-12 order-md-1 fxt-bg-color">
                        <div class="fxt-content">
                           <h2>Register</h2>
                           <div class="fxt-form">
                              <form action="{{ route('registeruser.store') }}" method="POST" enctype="multipart/form-data">
                                 @csrf

                                 @method('GET')

                                    <div claswwas="form-group">
                                       <label for="f_name" class="input-label">Name</label>
                                       <input type="text" id="f_name" class="form-control" name="name" placeholder="Masukkan Nama" required="required">
                                    </div>
                                    <div class="form-group">
                                       <label for="l_name" class="input-label">Email</label>
                                       <input type="text" id="l_name" class="form-control" name="email" placeholder="Masukkan Email" required="required">
                                    </div>
                                    <div class="form-group">
                                       <label for="password" class="input-label">Password</label>
                                       <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                                       <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    </div>
                                    <div class="form-group">
                                       <div class="fxt-checkbox-area">
                                          <div class="checkbox">
                                             <input id="checkbox1" type="checkbox">
                                             <label for="checkbox1">I agree with the terms and condition</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="fxt-btn-fill">Register</button>
                                    </div>
                              </form>
                           </div>
                           <div class="fxt-footer">
                              <p>have an account?<a href="{{ route('login.index') }}" class="switcher-text2 inline-text">Login</a></p>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
      </div>
   </div>

   <script src="assets/js/jquery-3.5.0.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/validator.min.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>