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
    <link rel="stylesheet" href="{{ asset('css/simple-calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>    <link rel="stylesheet" href="{{ asset('css/theme-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new-style2.css') }}">
    <!-- End Style -->
</head>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <a type="" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></a>
                        <div class="nav-item dropdown">
                            <a class=" dropdown-toggle" href="#" data-toggle="dropdown">
                                <img src="{{ asset('images/school.png') }}" style="width: 20px">
                                الدورات
                                <i class="ik ik-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" style="position: relative; right: 1px;">
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-gavel"></i>
                                    أعوان القضاة
                                </a>
                                <li><a class="dropdown-item" href="#">
                                        <i class="fa fa-gavel"></i>
                                        القضاة
                                        <i class="fa fa-angle-left float-left" style="line-height: 1.4;"></i>
                                    </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="">عموم القضاة </a></li>
                                        <li><a class="dropdown-item" href="">قضاة الأحوال الشخصية </a></li>
                                        <li><a class="dropdown-item" href="">قضاة الإستئناف</a></li>
                                        <li><a class="dropdown-item" href="">قضاة التنفيذ </a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-user"></i> المحامون </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-address-book"></i> الملازمون </a> </li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-outdent"></i> الموثقين </a> </li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-balance-scale"></i> كتاب العدل </a> </li>
                            </ul>
                        </div>
                        <div class="nav-item">
                            <a class="" href="#">
                                <img src="{{ asset('images/computer.png') }}" style="width: 20px">
                                المسارات
                            </a>
                        </div>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="input-group md-form form-sm form-2 pl-0 searchclass">
                            <input class="form-control my-0 py-1 amber-border" type="text" placeholder="البحث" aria-label="Search">
                            <a href="#">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-text1">
                                        <i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </div>
                        <button type="button" class="nav-link ml-10 right-sidebar-toggle">
                            <i class="far fa-calendar-alt"></i>
                            <span class="badge bg-success">0</span></button>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" data-toggle="dropdown">
                                <i class="ik ik-bell"></i><span class="badge bg-danger">0</span></a>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <h4 class="header">الإشعارات</h4>
                                <div class="notifications-wrap">
                                    <a href="#" class="media">
                                        <span class="d-flex"><i class="ik ik-check"></i> </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">تمت الموافقه ع طلبك</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex"><i class="ik ik-check"></i> </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">لديك خبر جديد</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media"> <span class="d-flex"><i class="ik ik-check"></i> </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">لديك خبر جديد</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="footer"><a href="">كل الإشعارات</a></div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle pub-ser" href="#" id="userDropdown" data-toggle="dropdown">
                                <i class="ik ik-chevron-down"></i>
                                <img class="avatar" src="{{ asset('images/Dr_Image.jpg') }}" alt="">
                                <span style="font-size: 11px; line-height: 4.6;">{{ Auth::user()->username }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">الملف الشخصي <i class="ik ik-user dropdown-icon"></i> </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج <i class="ik ik-power dropdown-icon"></i> </a>
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
                    <a class="header-brand" href="{{ route('dashboard') }}">
                        <div class="logo-img">
                            <img src="{{ asset('images/new-logo.png') }}" class="header-brand-img" alt="jtc">
                        </div>
                    </a>
                </div>