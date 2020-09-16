<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>مركز التدريب العدلي | لوحة التحكم</title>
    <link rel='icon' href="{{ asset('images/favicon.ico') }}" type='image/x-icon' />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icon-kit/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Almarai|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/simple-calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"/>  
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/theme-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/new-style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- End Style -->
</head>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        @if(!isset($role) || $role == 1)
                        <a type="" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></a>
                        @endif
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <!-- <div class="input-group md-form form-sm form-2 pl-0 searchclass">
                            <input class="form-control my-0 py-1 amber-border" type="text" placeholder="البحث" aria-label="Search">
                            <a href="#">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-text1">
                                        <i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </div> -->
                        <button type="button" class="nav-link ml-10 right-sidebar-toggle">
                            <i class="far fa-calendar-alt"></i>
                            <span class="badge bg-success">0</span></button>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" data-toggle="dropdown">
                            <?php
                              $notifications =\App\Models\Notification::where('is_read',0)->where('user_id',Auth::user()->id )->get();
                            ?>
                                <i class="ik ik-bell"></i><span class="badge bg-danger">{{count($notifications)}}</span></a>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <h4 class="header">الإشعارات</h4>
                                <div class="notifications-wrap">
                                @foreach($notifications as $notification)
                                    <a href="#" class="media">
                                        <span class="d-flex"><i class="ik ik-check"></i> </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">{{$notification->title_ar}}</span>
                                        </span>
                                    </a>
                                @endforeach
                                </div>
                                <div class="footer"><a href="">كل الإشعارات</a></div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle pub-ser" href="#" id="userDropdown" data-toggle="dropdown">
                                <i class="ik ik-chevron-down"></i>
                                <img class="avatar" src="{{ Auth::user()->image?url(Auth::user()->image): asset('site-assets/images/avatarman.png') }}" alt="">
                                <span style="font-size: 11px; line-height: 4.6;">{{ Auth::user()->name_ar }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('edit-profile') }}">الملف الشخصي <i class="ik ik-user dropdown-icon"></i> </a>
                                @foreach (Auth::user()->roles as $key=>$role)
                                    @if ($role->name=='instructor')
                                     <a class="dropdown-item" href="/dashboard/instructor">دخول كمدرب<i class="fas fa-unlock-alt  dropdown-icon"></i> </a>
                                    @elseif ($role->name=='trainee')
                                     <a class="dropdown-item" href="/dashboard/trainee">دخول كمتدرب<i class="fas fa-unlock-alt  dropdown-icon"></i> </a>
                                    @elseif ($role->name=='support')
                                     <a class="dropdown-item" href="/dashboard/support">دخول كمسئول دعم فنى<i class="fas fa-unlock-alt  dropdown-icon"></i> </a>
                                    @elseif ($role->name=='admin')
                                     <a class="dropdown-item" href="/dashboard/admin">دخول كمدير للمنصة<i class="fas fa-unlock-alt  dropdown-icon"></i> </a>
                                    @endif
                                @endforeach
                                <a class="dropdown-item" href="/password/reset">تغيير كلمة المرور <i class="fas fa-unlock-alt  dropdown-icon"></i> </a>
                                <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج <i class="ik ik-power dropdown-icon"></i> </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></a>
                    <a class="header-brand" href="{{ url('/') }}">
                        <div class="logo-img">
                            <img src="{{ asset('images/new-logo.png') }}" class="header-brand-img" alt="jtc">
                        </div>
                    </a>
                </div>
