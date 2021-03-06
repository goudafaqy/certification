<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> اعادة كلمة السر</title>
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

                                <form class="login-form" action="{{ route('send_password_link') }}" method="POST">
                                    @csrf
                                    <div class="logo-centered">
                                        <a href="{{ url('/') }}">
                                            <img src="{{asset('site-assets/images/new-logo.png')}}" class="" alt="">
                                        </a>
                                    </div>
                                    <span class="login-form-title "> </span>
                   
                    
                                    @if (session('info'))
                                        <div class="alert alert-info alert-dismissible fade show">
                                            {{ session('info') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="row">
                                    
                                        <div class="col-md-7" style="border-left: 1px solid">
                                            <!--                      <label class="label" for="">اسم المستخدم</label>-->
                                            <div class=" input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                                                </div>
                                                <input id="email" required name="email" class="form-control input-login @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" placeholder="البريد الإلكتروني" autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback text-right" role="alert" style="font-size: 1em; margin-top: 10px;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror                                            </div>


                                           
                                            <div style="text-align: center">
                                                <button class="login-form-btn">
                                                    ارسال
                                                </button>
                                            </div>
                                            <!-- <p  style="text-align: center">ان لم يكن لديك حساب فقم بإنشاء حساب</p> -->
                                            <div style="text-align: center">
                                                <a  href="{{url('login')}}" class="login-link">
                                                تسجيل دخول
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-5 jtc">

                                            <div class=" d-flex justify-content-between">
                                                <img src="{{asset('site-assets/images/student-avatar.png')}}">


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

