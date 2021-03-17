<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> تسجيل الدخول</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{asset('site-assets/css\bootstrap-rtl.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('site-assets/css/all.min.cs')}}s">
    <link rel="stylesheet" href="{{asset('site-assets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('site-assets/css/style-login.css')}}">

</head>

<body>



<div class="auth-wrapper">
    <div class="container-fluid ">
        <div class="row flex-row h-100">
            <div class=" col-md-12 p-0 d-md-block d-lg-block">
                <div class="bg2" style="background-image: url('{{asset('site-assets/images/slider/1.jpg')}}')">
                    <div class="overlay"></div>

                    <div class="col-xl-8 col-lg-8 col-md-9 my-auto">
                        <div class="container-login">
                            <div class="wrap-login">

                                <form class="login-form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="logo-centered">
                                        <a href="{{ url('/') }}">
                                        <img src="{{asset('site-assets/images/new-logo.png')}}">
                                        </a>
                                    </div>
                                   
                                    <span class="login-form-title ">
					            </span>
                                    <div class="row">
                                        <div class="col-md-12">
                                        @if (\Session::has('error'))
                                        <div class="alert alert-danger" style="text-align:center">
                                        {!! \Session::get('error') !!}
                                        </div>
                                        @endif
                                            <div class=" input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                                                </div>

                                                <input id="email" required name="email" class="form-control input-login @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" placeholder="أسم المستخدم" autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback text-right" role="alert" style="font-size: 1em; margin-top: 10px;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                           
                                            </div>    



                                            <div class=" input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                                                </div>

                                               

                                                <input id="password" required name="password" class="form-control input-login @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" placeholder="كلمة السر" autocomplete="national_id" autofocus>
                                                @error('national_id')
                                                <span class="invalid-feedback text-right" role="alert" style="font-size: 1em; margin-top: 10px;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>                                                

                                       
                                            <div class=" d-flex justify-content-between">
                                                <div class="">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                                    <span class="custom-control-label">&nbsp;تذكرني</span>
                                                </label>
                                            </div>
                                                <div class="">
                                                    <a href="" class="forget">نسيت كلمة المرور ؟ </a>
                                                </div>
                                            </div>
                                           
                                            <div style="text-align: center">
                                                <button class="login-form-btn">
                                                    تسجيل الدخول
                                                </button>
                                            </div>
                                           
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-7" style="border-left: 1px solid">





                                        </div>

                                        <div class="col-md-5">
                                            <!-- <div class=" login-so d-flex justify-content-between align-items-center">

                                      <div style="">
                                         <p class="">
                                              سجل الدخول بإستخدام
                                         </p>
                                     </div>

                                      <div>
                                         <a href="#" class="">
                                         <i class="fab fa-google"></i>
                                         </a>
                                          <a href="#" class="">
                                           <i class="fab fa-linkedin-in"></i>
                                         </a>
                                     </div>

                                    </div> -->
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>

</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>

