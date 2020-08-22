@extends('site.layouts.master')

@section('content')
    <section class="intro">


        <div id="swiper" class="swiper-container loading no-printme">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-test-set="test" style="background-image:url({{asset('site-assets/images/slider/1.jpg')}})">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <h2>أهداف المركز</h2> 
                                <h6>
                              تدريب مستمر وفاعل يسهم في رفع كفاءة الممارسين العدليين
                          
                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-test-set="test" style="background-image:url({{asset('site-assets/images/slider/2.jpg')}})">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <h2>أهداف المركز</h2>
                                <h6>
                                نحو توظيف التقنية في تعزيز برامج التدريب والتأهيل العدلي المتخصص 

                                </h6>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="swiper-slide" data-test-set="test" style="background-image:url({{asset('site-assets/images/slider/3.jpg')}})">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <h2>أهداف المركز</h2>
                                <h6>يهدف المركز إلى الإسهام في رفع كفاءة وتأهيل القضاة ،وكتاب العدل وكتاب الضبط ومحضري
                                    الخصوم وأعضاء هيئة النظر وغيرهم من مساعدي وأعوان القضاة
                                </h6>

                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="swiper-slide" data-test-set="test" style="background-image:url({{asset('site-assets/images/slider/4.jpg')}})">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <h2>أهداف المركز</h2>
                                <h6>يهدف المركز إلى الإسهام في رفع كفاءة وتأهيل القضاة ،وكتاب العدل وكتاب الضبط ومحضري
                                    الخصوم وأعضاء هيئة النظر وغيرهم من مساعدي وأعوان القضاة
                                </h6>

                            </div>
                        </div>
                    </div>
                </div> -->



            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <!--
             <div class="swiper-button-prev "></div>
             <div class="swiper-button-next"></div>-->


        </div>


        <div class="Statistics">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-sm-6 col-md-3">


                        <div class="smicon-box iconbox-left">
                            <div class="boxes-icon"><a class="icon-box-link" target="_self" href="#"><span
                                        class="inner-icon"><span class="icon icon-images">
                          <img src="{{asset('site-assets/images/hours.svg')}}" alt=""></span></span></a>
                            </div>
                            <div class="content-inner">
                                <div><h3><a class="smicon-box-link" target="_self" href="#"> الساعات </a></h3></div>
                                <div class="desc-icon-box">
                                    <div class="desc-content"><span class="counter" data-count="5495"/></div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-6 col-md-3">

                        <div class="smicon-box iconbox-left">
                            <div class="boxes-icon"><a class="icon-box-link" target="_self" href="#"><span
                                        class="inner-icon"><span class="icon icon-images">
                          <img src="{{asset('site-assets/images/participates.svg')}}" alt=""></span></span></a>
                            </div>
                            <div class="content-inner">
                                <div><h3><a class="smicon-box-link" target="_self" href="#"> المشاركين</a></h3></div>
                                <div class="desc-icon-box">
                                    <div class="desc-content"><span class="counter" data-count="8117"/></div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-6 col-md-3">

                        <div class="smicon-box iconbox-left">
                            <div class="boxes-icon"><a class="icon-box-link" target="_self" href="#"><span
                                        class="inner-icon"><span class="icon icon-images">
                          <img src="{{asset('site-assets/images/programs.svg')}}" alt=""></span></span></a>
                            </div>
                            <div class="content-inner">
                                <div><h3><a class="smicon-box-link" target="_self" href="#"> البرامج </a></h3></div>
                                <div class="desc-icon-box">
                                    <div class="desc-content"><span class="counter" data-count="280"/></div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-6 col-md-3">

                        <div class="smicon-box iconbox-left">
                            <div class="boxes-icon"><a class="icon-box-link" target="_self" href="#"><span
                                        class="inner-icon"><span class="icon icon-images">
                          <img src="{{asset('')}}images/suitecase.svg"></span></span></a>
                            </div>
                            <div class="content-inner">
                                <div><h3><a class="smicon-box-link" target="_self" href="#"> الحقائب </a></h3></div>
                                <div class="desc-icon-box">
                                    <div class="desc-content"><span class="counter" data-count="120"/></div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="programs">
        <div class="container">
            <div class="clearfix">
                <div class="pull-right">
                    <h3 class="p-header">أحدث البرامج التدريبية</h3><span class="pull-left"></span>
                </div>
                <div class="pull-left">
                    <ul class="nav nav-tabs nav-pills" role="tablist">
                        @foreach($sliderItems as $class)
                        <li role="presentation" class="nav-item">
                            <a class="nav-link" href="#class-{{$class->id}}" aria-controls="commercial_law" role="tab" data-toggle="tab">
                                {{$class->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                @foreach($sliderItems as $class)
                <div role="tabpanel" class="tab-pane active" id="class-{{$class->id}}">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div  id="owl" class="owl-carousel owl-theme slides" style="direction: ltr;">
                            @php($courses  = $class->courses()->orderBy("created_at","DESC")->take(8)->get())

                            @foreach($courses as $course)
                            <div class="item">
                                <div class="course-item-wrapper">
                                    <div class="course-thumbnail">
                                        <a href="{{url('course/'.$course->id)}}"><img src="{{url($course->image != null?$course->image:'site-assets/images/2.jpg')}}" alt=""></a>
                                        <div class="price">{{$course->price}} SR</div>
                                    </div>
                                    <div class="thim-course-content">
                                        <div class="course-author">
                                            <div class="course-author-content">
                                                <img alt="" src="{{asset('images/Dr_Image.jpg')}}" class="avatar avatar-96 photo">
                                                <div class="author-contain">
                                                    <label>المعلم</label>
                                                    <div class="value" itemprop="name">
                                                        <a href="{{url('course/'.$course->id)}}">{{$course->instructor->name}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="course-title">
                                            <a href="{{url('course/'.$course->id)}}">{{$course->title}}</a>
                                        </h2>
                                        <div class="course-meta">
                                            <span> <i class="fa fa-user"></i>94 متدرب</span>
                                            <span>
                              <i class="fa fa-tag"></i>
                              <a href="{{url('course/'.$course->id)}}">{{$course->category->title}}</a>
                          </span>
                                            <span class="star"><i class="fa fa-star"></i> 3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
    <div id="swiper" class="articles d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row program d-flex align-items-center">
                <div class="col-lg-3 col-xs-12">
                    <h3>المسارات التاهيلية</h3>
                </div>
                <div class="col-lg-9">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="wpb_wrapper">
                            <div class="thim-widget-courses-collection">
                                <div class="thim-widget-course-categories thim-widget-course-categories-grid">
                                    <ul class="column-3">
                                        <li>
                                            <a href="/tracks/e2fc581a-4bf8-4b55-b13b-dbbe50d95ffd/about/" class="d-flex">
                                                <img src="{{asset('site-assets/images/0000_logo-react-32x32.png')}}"
                                                     alt="Web Design and Development Program" title="course-9" width="32"
                                                     height="32">
                                                برنامج تجريبي
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/tracks/0678993c-5dc3-47ec-a359-717f1bc3068b/about/" class="d-flex">
                                                <img src="{{asset('site-assets/images/0002_logo-asp-net-32x32.png')}}"
                                                     alt="Web Design and Development Program" title="course-9" width="32"
                                                     height="32">
                                                برنامج المحامي
                                            </a>
                                        </li>
                                    <!-- <li>
                                            <a href="#">
                                                <img src="{{asset('')}}images/0002_logo-asp-net-32x32.png" alt="ASP.NET Application"
                                                     title="_0002_logo-asp-net" width="32" height="32">
                                                ASP.NET Application
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('')}}images/0000_logo-react-32x32.png" alt="React Application"
                                                     title="_0000_logo-react" width="32" height="32">
                                                React Application
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('')}}images/0003_logo-php-32x32.png" alt="PHP Development"
                                                     title="_0003_logo-php" width="32" height="32">
                                                PHP Development
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('')}}images/0000_logo-react-32x32.png"
                                                     alt="Web Design and Development Program" title="course-9" width="32"
                                                     height="32">
                                                Web Design and Development Program
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="nb-head">
                            <div class="nb-heading">

                                <h2>التقويم<span> التدريبي</span></h2>
                            </div>
                            <div class="ev-slider-arrows">
                                <button type='button' class='slick-next slick-arrow'><i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                                <button type='button' class='slick-prev slick-arrow'><i class="fas fa-long-arrow-alt-left"></i>
                                </button>
                            </div>
                        </div>
                        <div class="event-slider">
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html">  ندوة بعنوان القانون الجنائى 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html">  ندوة بعنونا المنازعات التجارية 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html"> ندوة بعنوان القانون العمالى 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html">  ندوة بعنونا المنازعات التجارية 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html">   ندوة بعنونا المنازعات التجارية 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html">  ندوة بعنوان القانون الجنائى 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        30
                                    </div>
                                    <div class="month">
                                        Sep
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html">  ندوة بعنونا المنازعات التجارية 2020</a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            00: 12 pm
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            الرياض
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="testimonial-container">
                            <div class="slider testimonial-vertical">
                                <div class="te-item" style="height: 200px">
                                    <div class="te-content">
                                        <div>
                                            <div class="content">
                                                <p>
                                                    ‫‪...‬‬ ‫مطبوعه‬ ‫تصامیم‬ ‫كانت‬ ‫سواء‬ ‫بالتصامیم‬ ‫النصوص‬ ‫وضع‬ ‫طریقه‬ ‫لیتصور‬ ‫العمیل‬ ‫على‬ ‫لتعرض‬ ‫التصامیم‬ ‫في‬ ‫یوضع‬ ‫افتراضي‬ ‫نموذج‬
                                                    ‫...‬ ‫انترنت‬ ‫مواقع‬ ‫نماذج‬ ‫او‬ ‫‪...‬‬ ‫المثال‬ ‫سبیل‬ ‫على‬ ‫فلایر‬ ‫او‬ ‫بروشور‬
                                                </p>
                                            </div>
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{asset('site-assets/images/t1_bfxoncA.jpg')}}" alt="" width="100" height="100">
                                                </div>
                                                <div class="info">
                                                    <h3 class="title">‫حبیب‬ ‫رؤؤف‬</h3>
                                                    <div class="regency">‫قاضى‬</div>
                                                </div>
                                            </div>
                                            <div class="testimonials-navigation">
                                                <button type='button' class='slick-next slick-arrow'><i class="fa fa-chevron-down"></i></button>
                                                <button type='button' class='slick-prev slick-arrow'><i class='fa fa-chevron-up'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="te-item" style="height: 200px">
                                    <div class="te-content">
                                        <div>
                                            <div class="content">
                                                <p>
                                                    ‫‪...‬‬ ‫مطبوعه‬ ‫تصامیم‬ ‫كانت‬ ‫سواء‬ ‫بالتصامیم‬ ‫النصوص‬ ‫وضع‬ ‫طریقه‬ ‫لیتصور‬ ‫العمیل‬ ‫على‬ ‫لتعرض‬ ‫التصامیم‬ ‫في‬ ‫یوضع‬ ‫افتراضي‬ ‫نموذج‬
                                                    ‫...‬ ‫انترنت‬ ‫مواقع‬ ‫نماذج‬ ‫او‬ ‫‪...‬‬ ‫المثال‬ ‫سبیل‬ ‫على‬ ‫فلایر‬ ‫او‬ ‫بروشور‬
                                                </p>
                                            </div>
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{asset('site-assets/images/t2_ZWaKnz7.jpg')}}" alt="" width="100" height="100">
                                                </div>
                                                <div class="info">
                                                    <h3 class="title">‫رضا‬ ‫محمود‬ ‫احمد‬</h3>
                                                    <div class="regency">‫قضایا‬ ‫موثق‬</div>
                                                </div>
                                            </div>
                                            <div class="testimonials-navigation">
                                                <button type='button' class='slick-next slick-arrow'><i class="fa fa-chevron-down"></i></button>
                                                <button type='button' class='slick-prev slick-arrow'><i class='fa fa-chevron-up'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="te-item" style="height: 200px">
                                    <div class="te-content">
                                        <div>
                                            <div class="content">
                                                <p>
                                                    ‫بالتسجیل‬ ‫سارع‬ ‫سهلة‬ ‫بطریقة‬ ‫القانونیة‬ ‫المواد‬ ‫وهضم‬ ‫فهم‬ ‫فى‬ ‫تساعدك‬ ‫التى‬ ‫المریحة‬ ‫التدریبیة‬ ‫الادوات‬ ‫الطرق‬ ‫كافة‬ ‫یوفر‬ ‫المركز‬
                                                </p>
                                            </div>
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{asset('site-assets/images/t3_OOsOKDS.jpg')}}" alt="" width="100" height="100">
                                                </div>
                                                <div class="info">
                                                    <h3 class="title">‫على‬ ‫معوض‬</h3>
                                                    <div class="regency">‫متخصص‬ ‫مدرب‬</div>
                                                </div>
                                            </div>
                                            <div class="testimonials-navigation">
                                                <button type='button' class='slick-next slick-arrow'><i class="fa fa-chevron-down"></i></button>
                                                <button type='button' class='slick-prev slick-arrow'><i class='fa fa-chevron-up'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="te-item" style="height: 200px">
                                    <div class="te-content">
                                        <div>
                                            <div class="content">
                                                <p>
                                                    ‫المناسبة‬ ‫التدربیة‬ ‫الدورات‬ ‫عن‬ ‫والبحث‬ ‫التسجیل‬ ‫بسرعة‬ ‫انصح‬ ‫العدلى‬ ‫التدریب‬ ‫مركز‬ ‫منصة‬ ‫من‬ ‫كثیرا‬ ‫استفدت‬
                                                </p>
                                            </div>
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{asset('site-assets/images/t4_Svl3e3S.jpg')}}" alt="" width="100" height="100">
                                                </div>
                                                <div class="info">
                                                    <h3 class="title">‫احمد‬ ‫عمر‬ ‫محمد‬</h3>
                                                    <div class="regency">‫حر‬ ‫محامى‬</div>
                                                </div>
                                            </div>
                                            <div class="testimonials-navigation">
                                                <button type='button' class='slick-next slick-arrow'><i class="fa fa-chevron-down"></i></button>
                                                <button type='button' class='slick-prev slick-arrow'><i class='fa fa-chevron-up'></i></button>
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
    </section>
    <section class="tweetss">
        <div class="container">
            <div class="row">

                <div class="col-lg">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="side"
                             style="background-image:url({{asset('site-assets/images/gmail.png')}});background-size: 350px 350px; background-repeat: no-repeat;  background-position: center">

                            <div class="subscribe">
                                <div class="new-card2">
                                    <i class="far fa-envelope"></i>
                                    <div class="body_card2">
                                        <p>
                                            سجل الى القائمة البريدية ليصلك جديد البرامج والدوات التدريبية
                                        </p>
                                        <form>
                                            <input type="text" class="txte" placeholder="البريد الالكترونى">

                                            <input type="submit" class="button" value="سجل">

                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="side" style="background-image:url({{asset('site-assets/images/twitter-256.png')}});">
                            <div id="carouselExampleIndicators2" class="carousel slide twitter">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="new-card2">

                                            <i class="fab fa-twitter"></i>
                                            <div class="body_card2">
                                                <a href="#">الدكتور محمد على</a>
                                                <br/>
                                                <p>أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سدو أيوسمود تيمبوأنكايديديونتيوت
                                                    لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم </p>
                                                <br/><a href="https://t.co/5c13Tsrz5C"
                                                        target="_blank">https://t.co/5c13Tsrz5C</a>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="carousel-item ">
                                        <div class="new-card2">

                                            <i class="fab fa-twitter"></i>
                                            <div class="body_card2">
                                                <p>أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سدو أيوسمود تيمبوأنكايديديونتيوت
                                                    لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم </p>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="carousel-item ">
                                        <div class="new-card2">

                                            <i class="fab fa-twitter"></i>
                                            <div class="body_card2">

                                                <p>أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سدو أيوسمود تيمبوأنكايديديونتيوت
                                                    لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم </p>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <ol class="carousel-indicators indect">
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                </ol>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
