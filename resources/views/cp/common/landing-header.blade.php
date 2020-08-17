<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>مركز التدريب العدلي </title>
        <link rel='icon' href="{{ asset('images/favicon.ico') }}" type='image/x-icon' />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rvfs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mukhtar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">
        <link rel="stylesheet" href="{{ asset('css/new-style1.css') }}">
    </head>
    <body>
        
        <!-- start chat icon -->
        <div class="live-chat">
            <div class="chat">
                <div class="background"></div>
                <svg class="chat-bubble" width="100" height="100" viewBox="0 0 100 100">
                    <g class="bubble">
                        <path class="line line1" d="M 30.7873,85.113394 30.7873,46.556405 C 30.7873,41.101961
                    36.826342,35.342 40.898074,35.342 H 59.113981 C 63.73287,35.342
                    69.29995,40.103201 69.29995,46.784744" />
                        <path class="line line2" d="M 13.461999,65.039335 H 58.028684 C
                    63.483128,65.039335
                    69.243089,59.000293 69.243089,54.928561 V 45.605853 C
                    69.243089,40.986964 65.02087,35.419884 58.339327,35.419884" />
                    </g>
                    <circle class="circle circle1 c" r="1.9" cy="50.7" cx="42.5" />
                    <circle class="circle circle2 c" cx="49.9" cy="50.7" r="1.9" />
                    <circle class="circle circle3 c" r="1.9" cy="50.7" cx="57.3" />
                </svg>
            </div>
            <section class="chatbox-popup">
                <header class="chatbox-popup__header">
                    <aside style="flex:3">
                        <img src="{{ asset('images/chat.png') }}">
                    </aside>
                    <aside style="flex:8">
                        <!-- <i class="fas fa-sms"></i> -->
                        <h1>مركز التدريب العدلي</h1>
                    </aside>
                    <aside style="flex:1">
                        <button class="chat-box-close"> <i class="fa fa-close" aria-hidden="true"></i></button>
                    </aside>
                </header>
                <main class="chatbox-popup__main">
                    <div class="chat_msg">
                        <div class="chat_img">
                            <img src="{{ asset('images/chat.png') }}">
                        </div>
                        <div class="wrapper">
                            <h3>أهلا بك في مركز التدريب العدلي</h3>
                            <ul class="sessions">
                                <li><a href="#">أعوان القضاة</a></li>
                                <li><a href="#">القضاة</a></li>
                                <li><a href="#">المحامون</a></li>
                                <li><a href="#">الموثقين</a></li>
                                <li><a href="#">كتاب العدل</a></li>
                                <li><a class="time">الملازمون</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat_select">
                        الدورات
                    </div>
                    <div class="chat_msg">
                        <div class="wrapper">
                            <div class="chat_img">
                                <img src="{{ asset('images/chat.png') }}">
                            </div>
                            <p style="text-align:center"> زائرنا العزيز إسمح لنا بتقديم المساعدة للوصول إلى ما تريد
                                ...</p>
                        </div>
                    </div>
                    <div class="chat_user">
                        <div class="user_img">
                            <img src="{{ asset('images/avatar.png') }}">
                        </div>
                        <p style="text-align:center">أريد الوصول إلي ما أريد</p>
                    </div>
                    <div class="typing">
                        <span class="circle scaling"></span>
                        <span class="circle scaling"></span>
                        <span class="circle scaling"></span>
                    </div>
                </main>
                <footer class="chatbox-popup__footer">
                    <aside style="flex:1;color:#888;text-align:center;">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                    </aside>
                    <aside style="flex:10">
                        <textarea type="text" placeholder="اكتب الرسالة" autofocus></textarea>
                    </aside>
                    <aside style="flex:1;color:#888;text-align:center;">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </aside>
                </footer>
            </section>
        </div>
        <!-- end chat icon -->

        <!-- start-right-side and left-side -->
        <!-- start-social_media -->
        <div class="social_media">
            <ul>
                <li class="twitter-icon"><a href="#" class="icon-btn"><i class="fab fa-twitter"></i></a></li>
                <li class="snapchat-icon"><a href="#" class="icon-btn"><img src="{{ asset('images/snap.png') }}"></a></li>
                <li class="face-book-icon"><a href="#" class="icon-btn"><i class="fab fa-facebook-f"></i></a></li>
                <li class="insta-icon"><a href="#" class="icon-btn"><i class="fab fa-instagram"></i></a></li>
                <li class="linkedin-icon"><a href="#" class="icon-btn"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
        <!-- end-social_media -->

        <!-- start-setting -->
        <div class="setting">
            <ul>
                <!-- start-font-setting -->
                <div class="switcher">
                    <li id="click-to-show" class="toggle color-toggle"><a href="#collapse1" class="nav-toggle"><img
                                src="{{ asset('images/T.setting.png') }}"></a></li>
                    <span id="collapse1" class="switcher-icons btn-group hide">
                        <a class="zoom-out btn rvfs-reset"><img src="{{ asset('images/zoom-in.png') }}" class="img-fluid" width="18px"></a>
                        <a class="zoom btn rvfs-increase"><img src="{{ asset('images/zoom-out.png') }}" class="img-fluid" width="18px">
                        </a>
                    </span>
                </div>
                <!-- end-font-setting -->
                <!-- start-color-setting -->
                <div class="switcher">
                    <li id="click-to-showw" class="zoom-toggle toggle"><a href="#collapse2" class="nav-toggle"><img
                                src="{{ asset('images/dir.setting.png') }}"></a></li>
                    <span id="collapse2" class="switcher-icons color-switcher btn-group hide">
                        <li data-color="dark" type="button" class="btn color">
                            <span></span>
                        </li>
                        <li data-color="other" type="button" class="btn color1">
                            <span></span>
                        </li>
                        <li data-color="root" type="button" class="btn color2">
                            <span></span>
                        </li>
                    </span>
                </div>
                <!-- end-color-setting -->
                <!-- start-like-setting -->
                <div class="switcher">
                    <li id="click-to-shows" class="img-toggle toggle"><a href="#collapse3" class="nav-toggle"><img
                                src="{{ asset('images/hand.setting.png') }}"></a></li>
                    <span id="collapse3" class="switcher-icons btn-group hide">
                        <a href="#" onclick="imgSmile()" class="btn"><img src="{{ asset('images/hand.setting.png') }}" class="img-fluid"
                                width="18px"></a>
                        <a href="#" onclick="imgSmile()" class="btn"><img src="{{ asset('images/smile.png') }}" class="img-fluid"
                                width="18px"></a>
                        <a href="#" onclick="imgSmile()" class="btn"><img src="{{ asset('images/sad.png') }}" class="img-fluid"
                                width="18px"></a>
                    </span>
                </div>
                <!-- end-like-setting -->
                <!-- start-print-setting -->
                <li onclick={window.print()} class="toggle"><a href="#"><img src="{{ asset('images/print.setting.png') }}"></a></li>
                <!-- end-print-setting -->
                <!-- start-share icons-setting -->
                <div class="share-icons">
                    <li id="click-to-showss" class="share-icon toggle"><a href="#collapse4" class="nav-toggle"><i
                                class="fa fa-share-alt"></i></a></li>
                    <span id="collapse4" class="social-icons btn-group hide">
                        <a class="social-icon social-icon--twitter">
                            <i class="fab fa-twitter"></i>
                            <div class="tooltip">Twitter</div>
                        </a>
                        <a class="social-icon social-icon--linkedin">
                            <i class="fab fa-linkedin-in"></i>
                            <div class="tooltip">LinkedIn</div>
                        </a>
                        <a class="social-icon social-icon--facebook">
                            <i class="fab fa-facebook-f"></i>
                            <div class="tooltip">Facebook</div>
                        </a>
                        <a class="social-icon social-icon--copy">
                            <i class="far fa-copy"></i>
                            <div class="tooltip">CopyUrl</div>
                        </a>
                    </span>
                </div>
            </ul>
        </div>
        <!-- end social_media and setting -->

        <div class="full-body">
            <header>
                <nav class="navbar navbar-expand-lg fixed-top navbar-light header-border-bottom">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/') }} ">
                            <img src="{{ asset('images/logo-green.png') }}" class="img-fluid">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto ">

                                
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">
                                    <i class="fas fa-book-open"></i>
                                    الدورات
                                    </a>
                
                                <ul class="dropdown-menu animated " style="text-align: right;">
                                    <a  href="#" class="dropdown-item" > 
                                        <i class="fa fa-gavel"></i>
                                        أعوان القضاة  
                                        </a>                      
                                    <li><a class="dropdown-item" href="#"> 
                                        <i class="fa fa-gavel"></i>
                                        القضاة
                                    <i class="fa fa-angle-left float-left" style="line-height: 1.4;"></i>   
                                        </a>
                                        <ul class="submenu dropdown-menu animated" style="text-align: right;">
                                            <li><a class="dropdown-item" href=""> <i class="fas fa-list"></i> عموم القضاة </a></li>
                                            <li><a class="dropdown-item" href=""> <i class="fas fa-list"></i> قضاة الأحوال الشخصية </a></li>
                                            <li><a class="dropdown-item" href=""> <i class="fas fa-list"></i> قضاة الإستئناف</a></li>
                                            <li><a class="dropdown-item" href=""> <i class="fas fa-list"></i> قضاة التنفيذ </a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">  <i class="fa fa-user"></i> المحامون  </a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="fa fa-address-book"></i> الملازمون </a> </li>
                                    <li><a class="dropdown-item" href="#">  <i class="fa fa-outdent"></i> الموثقين </a> </li>
                                    <li><a class="dropdown-item" href="#">  <i class="fa fa-balance-scale"></i> كتاب العدل  </a> </li>

                                    </ul>
                                </li>
                            
                    
                                <li class="nav-item">
                                    <a class="nav-link " href="#">
                                        <i class="fas fa-landmark"></i>
                                        المسارات
                                    </a>
                                </li>
                            

                                <li class="nav-item">
                                    <div class="input-group md-form form-sm form-2 pl-0 searchclass">
                                        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="البحث"
                                            aria-label="Search" style="border-bottom-right-radius: 7px; border-top-right-radius: 7px;">
                                        <a href="#">
                                        <div class="input-group-append">
                                    <span class="input-group-text" id="basic-text1">
                                    <i class="fa fa-search" aria-hidden="true"></i></span>
                                        </div>
                                        </a>
                                        
                                    </div>
                                </li>


                            </ul>
                            
                
                            <ul class="navbar-nav mr-auto setting-menu" style="">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-outline-success" href="#"> {{Auth::user()->username}}   </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-outline-success" href="#">انضم كمدرب   </a>
                                    </li>
                                @endauth
                                
                                
                                <li class="nav-item mr-2" >
                                    <a class="nav-link" href="#"> <img src="{{ asset('images/reg.png') }}" style="width: 26px" alt="تسجيل جديد"></a>
                                </li>
                                
                                <li class="nav-item mr-2" >
                                    <a class="nav-link" href="{{ url('login') }} "> <img src="{{ asset('images/login-top.fdbd5b58a1fa.png') }}" style="width: 26px" caption="تسجيل الدخول"></a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> <img src="{{ asset('images\2030.png') }}" class="img-fluid vision"></a>
                                </li>
                                

                            </ul>


                        </div>
                    
                    </div>
                </nav>
            </header>