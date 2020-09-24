@extends('site.layouts.master')

@section('content')
    <section class="intro">


        <div id="swiper" class="swiper-container loading no-printme">
            <div class="swiper-wrapper">
            <div class="swiper-slide" data-test-set="test" style="background-image:url({{asset('site-assets/images/shutterstock_1540253891.jpg')}})">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content right-content">
                            <a href="" class="btn04 btn05"><span>رؤيتنا</span></a>
                                <h6>
                              أن يكون المركز مرجعا فنيا ومعياريا رائدا ومزودا متميزا في التأهيل والتدريب

                                </h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-test-set="test" style="background-image:url({{asset('site-assets/images/shutterstock_389579191.jpg')}})">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content left-content">
                            <a href="" class="btn04 btn05"><span>رسالتنا</span></a>
                                <h5>
                                رفع كفاءة الممارسين العدليين من خلال توفير برامج نوعية وتمكين الشركاء بإطار معرفي ومعايير حاكمة

                                </h65>

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
                           
                            <a class="nav-link @if($loop->index==0) active @endif" href="#class-{{$class->id}}" aria-controls="commercial_law" role="tab" data-toggle="tab">
                              {{$class->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                @foreach($sliderItems as $class)
                <div role="tabpanel" class="tab-pane @if($loop->index==0) active @endif" id="class-{{$class->id}}">
                            @php($courses  = $class->courses()->orderBy("created_at","DESC")->take(8)->get())
                            @foreach($courses as $course)
                            <!-- <div class="item">
                                <div class="course-item-wrapper">
                                    <div class="course-thumbnail">
                                        <a href="{{url('course/'.$course->id)}}"><img src="{{url($course->image != null?$course->image:'site-assets/images/2.jpg')}}" alt=""></a>
                                        <div class="price"> ريال {{$course->price}}</div>
                                    </div>
                                    <div class="thim-course-content">
                                        <div class="course-author">
                                            <div class="course-author-content">
                                                <img alt="" src="{{$course->instructor->image != null ? url($course->instructor->image ):asset('images/Dr_Image.jpg')}}" class="avatar avatar-96 photo">
                                                <div class="author-contain">
                                                    <div class="value" itemprop="name">
                                                        <a href="{{url('course/'.$course->id)}}">{{$course->instructor->name}}-{{$class->id}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="course-title">
                                            <a href="{{url('course/'.$course->id)}}">{{$course->title}}</a>
                                        </h2>
                                        <div class="course-meta">
                                            <span> <i class="fa fa-user"></i>{{$course->seats}} متدرب</span>
                                            <span>
                                                <i class="fa fa-tag"></i>
                                                <a href="{{url('course/'.$course->id)}}">{{$course->category->title}}</a>
                                            </span>
                                            <span class="star"><i class="fa fa-star"></i> {{App\Http\Helpers\RatingHelper::GetAvgRating($course->ratings)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                            @endforeach
                   </div>     
                @endforeach
            </div>
        <!-- swiper card -->
        <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div id="swiperr" class="swiper-container loading no-printme">
                    <div class="swiper-wrapper">
                      
                        <div class="swiper-slide" data-test-set="test">
                            <div class="course-item-wrapper">
                                <div class="course-thumbnail">
                                    <a href="#"><img src="images/gr.png" alt=""></a>
                                    <div class="price">$55.00</div>
                                </div>
                                <div class="thim-course-content">
                                    <div class="course-author">
                                        <div class="course-author-content">
                                            <img alt="" src="images/face.png" class="avatar avatar-96 photo">
                                            <div class="author-contain">
                                                <label>المعلم</label>
                                                <div class="value" itemprop="name">
                                                    <a href="#">د.فارس بن محمد بن عبد الله القرني</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="course-title">
                                        <a href="#">الأوراق التجارية ومنازعاتها</a>
                                    </h2>
                                    <div class="course-meta">
                                        <span> <i class="fa fa-user"></i>94 متدرب</span>
                                        <span>
                                            <i class="fa fa-tag"></i>
                                            <a href="#">القانون التجاري</a>
                                        </span>
                                        <span class="star"><i class="fa fa-star"></i> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-test-set="test">
                            <div class="course-item-wrapper">
                                <div class="course-thumbnail">
                                    <a href="#"><img src="images/gr.png" alt=""></a>
                                    <div class="price">$55.00</div>
                                </div>
                                <div class="thim-course-content">
                                    <div class="course-author">
                                        <div class="course-author-content">
                                            <img alt="" src="images/face.png" class="avatar avatar-96 photo">
                                            <div class="author-contain">
                                                <label>المعلم</label>
                                                <div class="value" itemprop="name">
                                                    <a href="#">د.فارس بن محمد بن عبد الله القرني</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="course-title">
                                        <a href="#">الأوراق التجارية ومنازعاتها</a>
                                    </h2>
                                    <div class="course-meta">
                                        <span> <i class="fa fa-user"></i>94 متدرب</span>
                                        <span>
                                            <i class="fa fa-tag"></i>
                                            <a href="#">القانون التجاري</a>
                                        </span>
                                        <span class="star"><i class="fa fa-star"></i> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-test-set="test">
                            <div class="course-item-wrapper">
                                <div class="course-thumbnail">
                                    <a href="#"><img src="images/gr.png" alt=""></a>
                                    <div class="price">$55.00</div>
                                </div>
                                <div class="thim-course-content">
                                    <div class="course-author">
                                        <div class="course-author-content">
                                            <img alt="" src="images/face.png" class="avatar avatar-96 photo">
                                            <div class="author-contain">
                                                <label>المعلم</label>
                                                <div class="value" itemprop="name">
                                                    <a href="#">د.فارس بن محمد بن عبد الله القرني</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="course-title">
                                        <a href="#">الأوراق التجارية ومنازعاتها</a>
                                    </h2>
                                    <div class="course-meta">
                                        <span> <i class="fa fa-user"></i>94 متدرب</span>
                                        <span>
                                            <i class="fa fa-tag"></i>
                                            <a href="#">القانون التجاري</a>
                                        </span>
                                        <span class="star"><i class="fa fa-star"></i> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-test-set="test">
                            <div class="course-item-wrapper">
                                <div class="course-thumbnail">
                                    <a href="#"><img src="images/gr.png" alt=""></a>
                                    <div class="price">$55.00</div>
                                </div>
                                <div class="thim-course-content">
                                    <div class="course-author">
                                        <div class="course-author-content">
                                            <img alt="" src="images/face.png" class="avatar avatar-96 photo">
                                            <div class="author-contain">
                                                <label>المعلم</label>
                                                <div class="value" itemprop="name">
                                                    <a href="#">د.فارس بن محمد بن عبد الله القرني</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="course-title">
                                        <a href="#">الأوراق التجارية ومنازعاتها</a>
                                    </h2>
                                    <div class="course-meta">
                                        <span> <i class="fa fa-user"></i>94 متدرب</span>
                                        <span>
                                            <i class="fa fa-tag"></i>
                                            <a href="#">القانون التجاري</a>
                                        </span>
                                        <span class="star"><i class="fa fa-star"></i> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-test-set="test">
                            <div class="course-item-wrapper">
                                <div class="course-thumbnail">
                                    <a href="#"><img src="images/gr.png" alt=""></a>
                                    <div class="price">$55.00</div>
                                </div>
                                <div class="thim-course-content">
                                    <div class="course-author">
                                        <div class="course-author-content">
                                            <img alt="" src="images/face.png" class="avatar avatar-96 photo">
                                            <div class="author-contain">
                                                <label>المعلم</label>
                                                <div class="value" itemprop="name">
                                                    <a href="#">د.فارس بن محمد بن عبد الله القرني</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="course-title">
                                        <a href="#">الأوراق التجارية ومنازعاتها</a>
                                    </h2>
                                    <div class="course-meta">
                                        <span> <i class="fa fa-user"></i>94 متدرب</span>
                                        <span>
                                            <i class="fa fa-tag"></i>
                                            <a href="#">القانون التجاري</a>
                                        </span>
                                        <span class="star"><i class="fa fa-star"></i> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                
                        
                
                    </div>
                
                    <!-- If we need pagination -->
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper_buttons">
                     <a class="swiper-button-prev "></a>
                     <a class="swiper-button-next"></a>
                
                    </div>
                </div>
        </div>
        <!-- end swiper card -->



    </section>
    <div id="swiper" class="articles d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row program">

                <div class="col-lg-12 col-xs-12">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="items">
                                <div class="subscription-tag">تدريب</div>
                                <h6> علمي ومرجعي في المجال العدلي والقانوني</h6>
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

                        @foreach($advertisments as $item)
                            <div class="event-item">
                                <div class="time-from">
                                    <div class="date">
                                        {{date('d',strtotime($item->date) ) }}
                                    </div>
                                    <div class="month">
                                       {{date('M',strtotime($item->date) ) }}
                                    </div>
                                </div>
                                <div class="event-wrapper">
                                    <h5 class="title">
                                        <a href="events/summer-school-2015/index.html"> {{$item->title_ar??'' }} </a>
                                    </h5>
                                    <div class="meta">
                                        <div class="time">
                                            <i class="fa fa-clock-o"></i>

                                            {{$item->time??'' }}
                                        </div>
                                        <div class="location">
                                            <i class="fa fa-map-marker"></i>
                                            {{$item->location??'' }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="testimonial-container">
                            <div class="slider testimonial-vertical">

                             @foreach($testmonials as $item)
                                <div class="te-item" style="height: 240px; width: 100%; display: inline-block;">
                                    <div class="te-content">
                                        <div>
                                            <div class="content">
                                                <p>
                                                {{$item->message??'' }}‬
                                                </p>
                                            </div>
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{ url($item->image)}}" alt="" width="100" height="100">
                                                </div>
                                                <div class="info">
                                                    <h3 class="title"> {{$item->name??'' }}‬‬</h3>
                                                    <div class="regency"> {{$item->title??'' }}‬</div>
                                                </div>
                                            </div>
                                            <div class="testimonials-navigation">
                                                <button type='button' class='slick-next slick-arrow'><i class="fa fa-chevron-down"></i></button>
                                                <button type='button' class='slick-prev slick-arrow'><i class='fa fa-chevron-up'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

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
                                        <p class="email-p">
                                            سجل الى القائمة البريدية ليصلك جديد البرامج والدوات التدريبية
                                        </p>

                                        <form>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="{{asset('site-assets/images/mail.png')}}" class="img-fluid" style="width:20px !important;height:20px !important"></span>
                                            </div>
                                            <input id="newsletter_email" required="" name="email" class="form-control" type="email" placeholder="البريد الإلكتروني">
                                        </div>
                                        <button type="button" id="newsletter" class="btn btn-vote"  style="background:#273044;color:#fff">
                                        سجل الأن
                                    </button>
                                    </form>




                                    </div>

                                    <span class="alert alert-success" role="alert" id="sccess" style="display:none">
                                      تم أضافة البريد الالكترونى بنجاح
                                    </span>

                                    <span class="alert alert-danger" role="alert" id="fail" style="display:none">
                                     هناك خطأ
                                    </span>

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
