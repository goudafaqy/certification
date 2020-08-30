@extends('site.layouts.master')
@section('content')
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/courses">الدورات التدريبية</a></li>
            <li class="breadcrumb-item active" aria-current="page">المنازعات التجاريه</li>
        </ol>
    </div>
</nav>


<div class="course-info-top">
    <div class="container">

        <div class="row">
            <div class="course-info-left col-sm-8">
                <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h1 class="entry-title">
                        {{$course->title}}
                    </h1>
                    <p> {{substr($course->overview,0,200)}} ...
                    </p>
                </div>
                <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="course-meta">
                        <div class="course-author">
                            <div class="course-author-content">
                                <img alt="User Avatar" src="{{asset('site-assets/images/Dr_Image.jpg')}}" class="avatar avatar-96 photo" height="96" width="96">
                                <div class="author-contain">
                                    <label itemprop="jobTitle">المدرب</label>
                                    <div class="value">
                                        <a href="{{url('profile/'.$course->instructor_id)}}">
                                            {{$course->instructor->name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="course-categories">
                            <label>التصنيف
                            </label>
                            <div class="value">
                                <span class="cat-links">
                                    <a href="#"> {{$course->category->title}}</a>
                                </span>
                            </div>
                        </div>
                        <div class="course-review">
                            <label>التقيم</label>
                            <div class="value">
                                <div class="review-stars-rated">
                                    <ul class="review-stars">

                                        <li><span class="far fa-star"></span></li>
                                        <li><span class="far fa-star"></span></li>
                                        <li><span class="far fa-star"></span></li>
                                        <li><span class="far fa-star"></span></li>
                                        <li><span class="far fa-star"></span></li>
                                    </ul>
                                </div>
                                {{-- <span>(تقيم)</span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="course-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="course-summary">
                        <div id="learn-press-course-tabs" class="course-tabs">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="course-nav-tab-overview active thim-col-4">
                                    <a href="#tab-overview" data-toggle="tab">
                                        <img src="{{asset('site-assets/images/agenda (1).png')}}" class="img-fluid" width="20">
                                        <span>نظرة عامة</span>
                                    </a>
                                </li>
                                <li role="presentation" class="course-nav-tab-curriculum thim-col-4">
                                    <a href="#tab-curriculum" data-toggle="tab">
                                        <img src="{{asset('site-assets/images/product-description.png')}}" class="img-fluid" width="20">
                                        <span>المخطط</span>
                                    </a>
                                </li>
                                <li role="presentation" class="course-nav-tab-instructor thim-col-4">
                                    <a href="{{url('profile/'.$course->instructor_id)}}">
                                        <img src="{{asset('site-assets/images/teacher.png')}}" class="img-fluid" width="20">
                                        <span>المدرب</span>
                                    </a>
                                </li>
                                <li role="presentation" class="course-nav-tab-reviews thim-col-4">
                                    <a href="#tab-reviews" data-toggle="tab">
                                        <img src="{{asset('site-assets/images/laww.png')}}" class="img-fluid" width="20">
                                        <span>المراجعات</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane course-tab-panel-overview course-tab-panel active" id="tab-overview">
                                    <div class="course-description" id="learn-press-course-description">
                                        <div class="thim-course-content">
                                            <h4> {{$course->overview}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane course-tab-panel-curriculum course-tab-panel" id="tab-curriculum">
                                    <div class="course-curriculum" id="learn-press-course-curriculum">
                                        <div class="curriculum-scrollable">
                                            <ul class="curriculum-sections">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <?php $counter = 1; ?>
                                                    @foreach($sections as $section)

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="section-{{$counter}}">
                                                            <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#section-{{$counter}}_contents" aria-expanded="false" aria-controls="section-{{$counter}}_contents">
                                                                <a>
                                                                    <i class="fa fa-chevron-down"></i>{{$section->title_ar??'' }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="section-{{$counter}}_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="section-{{$counter}}" style="">
                                                            <?php $inner = 1; ?>
                                                            @foreach($section->units as $unit)
                                                            <div class="panel-body">
                                                                <div class="panel-heading" role="tab" id="subsection-{{$inner}}">
                                                                    <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-{{$inner}}_contents" aria-expanded="false" aria-controls="subsection-{{$inner}}_contents">
                                                                        <a>
                                                                            <i class="fa fa-chevron-down"></i>{{$unit->title_ar??'' }}
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div id="subsection-{{$inner}}_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="subsection-{{$inner}}" style="">
                                                                    <div class="panel-body" style="text-align:center">
                                                                        <p> <?php echo $unit->text ?? '' ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $inner++; ?>
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                    <?php $counter++; ?>
                                                    @endforeach


                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane course-tab-panel-reviews course-tab-panel" id="tab-reviews">
                                    <div class="course-rating">
                                        <div class="section-header wow fadeInDown" style="visibility: hidden; animation-name: none;">
                                            <h4><span> المراجعات</span></h4>

                                        </div>
                                        <div class="average-rating">
                                            <p class="rating-title">متوسط تقييم</p>
                                            <div class="rating-box">
                                                <div class="average-value" itemprop="ratingValue">0</div>
                                                <div class="review-star">
                                                    <div class="review-stars-rated">
                                                        <ul class="review-stars">
                                                            <li><span class="far fa-star"></span></li>
                                                            <li><span class="far fa-star"></span></li>
                                                            <li><span class="far fa-star"></span></li>
                                                            <li><span class="far fa-star"></span></li>
                                                            <li><span class="far fa-star"></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="review-amount" itemprop="ratingCount">
                                                    0 rating
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detailed-rating">
                                            <p class="rating-title">تقييم مفصل</p>

                                            <div class="rating-box">
                                                <div class="detailed-rating">
                                                    <div class="stars">
                                                        <div class="key">
                                                            ٥
                                                        </div>
                                                        <div class="bar">
                                                            <div class="full_bar">
                                                                <div style="width:50% "></div>
                                                            </div>
                                                        </div>
                                                        <span>50%</span>
                                                    </div>
                                                    <div class="stars">
                                                        <div class="key">
                                                            ٤
                                                        </div>
                                                        <div class="bar">
                                                            <div class="full_bar">
                                                                <div style="width:0%"></div>
                                                            </div>
                                                        </div>
                                                        <span>0%</span>
                                                    </div>
                                                    <div class="stars">
                                                        <div class="key">
                                                            ٣
                                                        </div>
                                                        <div class="bar">
                                                            <div class="full_bar">
                                                                <div style="width:0%"></div>
                                                            </div>
                                                        </div>
                                                        <span>0%</span>
                                                    </div>
                                                    <div class="stars">
                                                        <div class="key">
                                                            ٢
                                                        </div>
                                                        <div class="bar">
                                                            <div class="full_bar">
                                                                <div style="width:50%"></div>
                                                            </div>
                                                        </div>
                                                        <span>50%</span>
                                                    </div>
                                                    <div class="stars">
                                                        <div class="key">
                                                            ١
                                                        </div>
                                                        <div class="bar">
                                                            <div class="full_bar">
                                                                <div style="width:0%"></div>
                                                            </div>
                                                        </div>
                                                        <span>0%</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="review-stars-rated">
                                            <div class="review-stars empty"></div>
                                            <div class="review-stars filled" style="width:0%;"></div>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="related-courses">
                            <h3 class="p-header">كورسات ذات صله</h3><span class="pull-left"></span>
                            <div class="clear">
                                <div class="owl-carousel owl-carousell owl-theme slides" style="direction: ltr;">

                                    @foreach($related_courses as $coursee)
                                    <div class="item">
                                        <div class="course-item-wrapper">
                                            <div class="course-thumbnail">
                                                <a href="{{url('course/'.$coursee->id)}}"><img src="{{url($coursee->image != null?$coursee->image:'site-assets/images/2.jpg')}}" alt=""></a>
                                                <div class="price">{{$coursee->price}} SR</div>
                                            </div>
                                            <div class="thim-course-content">
                                                <div class="course-author">
                                                    <div class="course-author-content">
                                                        <img alt="" src="{{asset('images/Dr_Image.jpg')}}" class="avatar avatar-96 photo">
                                                        <div class="author-contain">
                                                            <label>المعلم</label>
                                                            <div class="value" itemprop="name">
                                                                <a href="{{url('course/'.$coursee->id)}}">{{$coursee->instructor->name}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 class="course-title">
                                                    <a href="{{url('course/'.$coursee->id)}}">{{$coursee->title}}</a>
                                                </h2>
                                                <div class="course-meta">
                                                    <span> <i class="fa fa-user"></i>94 متدرب</span>
                                                    <span>
                                                        <i class="fa fa-tag"></i>
                                                        <a href="{{url('course/'.$coursee->id)}}">{{$coursee->category->title}}</a>
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
                    </div>
                </div>
            </div>
            {{-- =============right side============--}}
            <div class="col-sm-12 col-md-4">

                <div class="course-info-right sticky-sidebar">
                    <div class="sticky-content">
                        <div class="course-info-wrapper">
                            <div class="right-col__content">
                                <div class="right-col__wrapper">
                                    <div class="course-thumbnail">
                                        <img src="{{url($course->image)}}" class="attachment-full size-full wp-post-image img-fluid" alt="">
                                    </div>
                                    <div class="course-payment">
                                        <div class="course-price">
                                            <span class="label">السعر</span>
                                            <div class="value ">
                                                {{$course->price}} ريـال
                                            </div>
                                        </div>

                                        <div class="lp-course-buttons">
                                            <form name="purchase-course" class="purchase-course form-purchase-course" action="{{route('purchase-course')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="purchase-course" value="5181">
                                                <input type="hidden" name="purchase-course-nonce" value="1ad69a85d7">
                                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                                @php
                                                    $start = \Carbon\Carbon::createFromTimeString($course->start_date.' '.'00:00:01');
                                                    $end = \Carbon\Carbon::createFromTimeString($course->end_date.' '.'23:59:59');
                                                @endphp

                                                <button {{$course->students()->count() < $course->seats? "" : "disabled"}} {{$start->isPast()? "" : "disabled"}} {{$end->isPast()? "disabled" : ""}} type="submit" class="lp-button button button-purchase-course thim-enroll-course-button">
                                                    @if(auth()->guest())
                                                    سجل دخول الآن
                                                    @elseif(auth()->user() && !$course->students->contains(auth()->user()->id))
                                                    سجل في الدوره الآن
                                                    @elseif($course->students->contains(auth()->user()->id))
                                                    استعرض الان
                                                    @endif
                                                </button>
                                                <input type="hidden" name="redirect_to" value="">
                                                <input type="hidden" name="single-purchase" value="yes">
                                                <input type="hidden" name="add-to-cart" value="5181">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="thim-course-feature">
                                        <ul>
                                            <!-- <li class="lectures-feature">
                                                    <img src="images/agenda (1).png" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="value">5</span>
                                                    <span class="label">محاضرات</span>
                                                </li>
                                                <li class="quizzes-feature">
                                                    <img src="images/exam.png" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="value">0</span>
                                                    <span class="label">الإختبارات</span>
                                                </li> -->
{{--                                            <<<<<<< HEAD--}}
{{--                                            <li class="duration-feature">--}}
{{--                                                <img src="{{asset('site-assets/images/calendar2.png')}}" width="20" class="im-fluid" style="width:20px !important">--}}
{{--                                                <span class="label">تاريخ بدء التسجيل</span>--}}
{{--                                                <span class="value">{{$course->start_date}}</span>--}}

{{--                                            </li>--}}
{{--                                            <li class="duration-feature">--}}
{{--                                                <img src="{{asset('site-assets/images/calendar2.png')}}" width="20" class="im-fluid" style="width:20px !important">--}}
{{--                                                <span class="label">تاريخ نهاية التسجيل</span>--}}
{{--                                                <span class="value">{{$course->end_date}}</span>--}}

{{--                                            </li>--}}
{{--                                            <li class="skill-feature">--}}
{{--                                                <img src="{{asset('site-assets/images/schedule.png')}}" width="20" class="im-fluid" style="width:20px !important">--}}
{{--                                                <span class="label">مدة البرنامج</span>--}}
{{--                                                <span class="value">{{$course->appointments()->count()}} محاضرات </span>--}}

{{--                                            </li>--}}
{{--                                            <li class="skill-feature">--}}
{{--                                                <img src="{{asset('site-assets/images/teaching.png')}}" width="20" class="im-fluid" style="width:20px !important">--}}
{{--                                                <span class="label">مستوى البرنامج</span>--}}
{{--                                                @if($course->skill_level == "m")--}}
{{--                                                    <span class="value">متوسط</span>--}}
{{--                                                @elseif($course->skill_level == "l")--}}
{{--                                                    <span class="value">منخفض</span>--}}
{{--                                                @else--}}
{{--                                                    <span class="value">متقدم</span>--}}
{{--                                                @endif--}}
{{--                                                <span class="value"></span>--}}

{{--                                            </li>--}}
{{--                                            <li class="language-feature">--}}
{{--                                                <img src="{{asset('site-assets/images/world.png')}}" width="20" class="im-fluid" style="width:20px !important">--}}

{{--                                                <span class="label">اللغة</span>--}}
{{--                                                <span class="value">العربية</span>--}}
{{--                                            </li>--}}

{{--                                            <ul class="under-links">--}}
{{--                                                =======--}}
                                            <li class="duration-feature">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span class="label">تاريخ بدء التسجيل</span>
                                                <span class="value">{{$course->start_date}}</span>

                                            </li>
                                            <li class="duration-feature">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span class="label">تاريخ نهاية التسجيل</span>
                                                <span class="value">{{$course->end_date}}</span>

                                            </li>
                                            <li class="skill-feature">
                                                <i class="far fa-clock"></i>
                                                <span class="label">مدة البرنامج</span>
                                                <span class="value">{{$totalTime/60}} ساعات </span>

                                            </li>
                                            <li class="skill-feature">
                                                <i class="fas fa-level-up-alt"></i>
                                                <span class="label">مستوى البرنامج</span>
                                                @if($course->skill_level == "m")
                                                <span class="value">متوسط</span>
                                                @elseif($course->skill_level == "l")
                                                <span class="value">منخفض</span>
                                                @else
                                                <span class="value">متقدم</span>
                                                @endif
                                                <span class="value"></span>

                                            </li>
                                            <li class="language-feature">
                                                <i class="fa fa-language"></i>

                                                <span class="label">اللغة</span>
                                                <span class="value">العربية</span>
                                            </li>
                                            <li class="language-feature">
                                                <i class="fa fa-user-alt-slash"></i>

                                                <span class="label">اقصى عدد</span>
                                                <span class="value">{{$course->seats}} متدرب </span>
                                            </li>
                                            <li class="language-feature">
                                                <i class="fa fa-user-plus"></i>

                                                <span class="label">عدد المسجلين</span>
                                                <span class="value">{{$course->students()->count()}} متدرب </span>
                                            </li>
                                            <!-- <ul class="under-links">
>>>>>>> 04f1403c73dcd8c0a0db022c37c832fe71c60a0c
                                                    <h4>يحتوي البرنامج علي </h4>
                                                    <li class="language-feature">
                                                        <img src="{{asset('site-assets/images/cou.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                        <span class="label">وحدة تدريبية</span>
                                                    </li>
                                                    <li class="language-feature">
                                                        <img src="{{asset('site-assets/images/computer.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                        <span class="label">نشاط</span>
                                                    </li>
                                                    <li class="language-feature">
                                                        <img src="{{asset('site-assets/images/contract.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                        <span class="label">تقييم الجدارات</span>
                                                    </li>
                                                    <li class="language-feature">
                                                        <img src="{{asset('site-assets/images/graph.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                        <span class="label">الأدوات والتجهيزات اللازمة</span>
                                                    </li>
                                                </ul> -->
                                            <!-- <li class="students-feature">
                                                    <img src="images/man.png" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="value"></span>
                                                    <span class="label"> 94 طالب</span>
                                                </li> -->
                                        </ul>
                                    </div>
                                    <div class="social_share">
                                        <ul class="thim-social-share">
                                            <li class="heading">Share:</li>
                                            <li>
                                                <div class="facebook-social">
                                                    <a target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}" title="Facebook">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="googleplus-social">
                                                    <a target="_blank" class="googleplus" href="#" title="email">
                                                        <i class="far fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="twitter-social">
                                                    <a target="_blank" class="twitter" href="https://twitter.com/intent/tweet?text={{$course->title}}&amp;url={{URL::current()}}" title="Twitter">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pinterest-social">
                                                    <a id="copy" class="pinterest" href="#" title="copUrl">
                                                        <i class="far fa-copy"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- ============= end right side============--}}

            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        $("#learn-press-course-tabs ul li a").click(function() {
            $("#learn-press-course-tabs ul li").removeClass("active");
            $(this).parent().addClass('active');
        });
    </script>
    <script>
        // Prevent closing from click inside dropdown
        $(document).on('click', '.dropdown-menu', function(e) {
            e.stopPropagation();
        });
        // make it as accordion for smaller screens
        if ($(window).width() < 992) {
            $('.dropdown-menu a').click(function(e) {
                e.preventDefault();
                if ($(this).next('.submenu').length) {
                    $(this).next('.submenu').toggle();
                }
                $('.dropdown').on('hide.bs.dropdown', function() {
                    $(this).find('.submenu').hide();
                })
            });
        }
    </script>
    @endsection

