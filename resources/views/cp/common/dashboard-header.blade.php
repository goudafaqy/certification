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
    <link rel="stylesheet" href="{{ asset('site-assets/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/DataTables/Select-1.3.1/css/select.bootstrap.min.css') }}">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/theme-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/new-style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('site-assets/css/jquery.lineProgressbar.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

    <!-- End Style -->
</head>

<style>
    .alert{
        text-align:center;
    }
</style>
<body>
    <div class="wrapper">
        <header class="header-top" header-theme="">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                       
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        
                        <?php dd(session()->has('user')); ?>
                        @if(session()->has('user'))
                        <div class="dropdown">
                            <a class="dropdown-toggle pub-ser" href="#" id="userDropdown" data-toggle="dropdown">
                              @if(session()->has('user')['sex'] == 1)
                                <img class="avatar" src="{{asset('site-assets/images/avatarman.png')}}" alt="">
                              @else  
                              <img class="avatar" src="{{asset('site-assets/images/avatarwoman.png')}}" alt="">
                              @endif
                                
                                <span style="font-size: 11px; line-height: 4.6; padding:0px 10px">{{ session()->get('user')->name }} <a  href="{{ route('logoutC') }}" > خروج  </a></span>
                                
                            </a>
                        </div>
                        @else

                        <div class="dropdown">
                            <a class="dropdown-toggle pub-ser" href="#" id="userDropdown" data-toggle="dropdown">
                                <img class="avatar" src="{{asset('site-assets/images/avatarman.png')}}" alt="">
                               
                                <span style="font-size: 11px; line-height: 4.6; padding:0px 10px">{{ Auth::user()->name }} <a  href="{{ route('logout_admin') }}" > خروج  </a></span>
                                
                            </a>
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></a>
                    <a class="header-brand" href="#">
                        <div class="logo-img">
                            <img src="{{ asset('images/new-logo.png') }}" class="header-brand-img" alt="jtc">
                        </div>
                    </a>
                </div>
