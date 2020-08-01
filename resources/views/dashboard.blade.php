@include('common.dashboard-header')


    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item active">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('images/home.png') }}" style="width: 22px">
                        <span> الصفحة الرئيسية </span>
                    </a>
                </div>
            </nav>
        </div>
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><img src="{{ asset('images/training.png') }}" style="width: 22px">
                        <span> مستخدمي النظام </span>
                    </a>
                    <div class="submenu-content">
                        <a href="{{ route('users-list') }}" class="menu-item"><img src="{{ asset('images/list.png') }}" style="width: 20px"> قائمة المستخدمين </a>
                        <a href="{{ route('users-add') }}" class="menu-item"> <img src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة مستخدم </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title"> الخدمات الإلكترونية</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="{{ asset('images/prof.png') }}">
                                        طلب إفادة
                                    </a>
                                </div>
                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="{{ asset('images/cancel.png') }}">
                                        طلب حذف دورة
                                    </a>
                                </div>

                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="{{ asset('images/cancel2.png') }}">
                                        طلب إلغاء تسجيل دورة
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget ">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> الإعلانات</h3>
                            <img src="images/speaker.png" style="width: 25px; height: 25px">

                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="owl-container">
                                    <div class="owl-carousel basic">
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/albom2.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3>
                                                        <a href="#">مركز التدريب العدلي</a>
                                                    </h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i> 09.10.2019 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-nav text-center">
                                        <a href="#" class="left-arrow owl-prev">
                                            <i class="ik ik-chevron-right"></i>
                                        </a>
                                        <div class="slider-dot-container"></div>
                                        <a href="#" class="right-arrow owl-next">
                                            <i class="ik ik-chevron-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.dashboard-footer')