@extends('site.layouts.master')

@section('content')
    <div class="top_site_main" style="color: #ffffff;background-image:url({{asset('site-assets/images/law3.jpg')}});">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container">
                <h2>الدورات التدريبية</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <nav class="breadcrumb-container breadcrumb-container2" aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الدورات التدريبية</li>
                </ol>
            </div>
        </nav>
    </div>

    <div class="category">
        <div class="container">
            <div class="row">
{{--                <div class="col-sm-3">--}}
{{--                    <aside class="widget-container thim-course-filter-wrapper">--}}
{{--                        <form action="#" name="thim-course-filter" method="POST" class="thim-course-filter">--}}

{{--                            <h4 class="filter-title">الفئة</h4>--}}
{{--                            <ul class="list-trainee-filter">--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="trainee-filter_all" name="trainee-type-filter" value="all">--}}
{{--                                    <label for="trainee-filter_all">--}}
{{--                                        الكل <span>(29)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="T1" name="trainee-type-filter" value="1">--}}
{{--                                    <label for="T1">--}}
{{--                                        &#8235;القضاة&#8236; <span>(4)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="T2" name="trainee-type-filter" value="2">--}}
{{--                                    <label for="T2">--}}
{{--                                        &#8235;القضاة&#8236; &#8235;أعوان&#8236; <span>(2)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="T3" name="trainee-type-filter" value="3">--}}
{{--                                    <label for="T3">--}}
{{--                                        &#8235;الملازمون&#8236; <span>(5)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="T4" name="trainee-type-filter" value="4">--}}
{{--                                    <label for="T4">--}}
{{--                                        &#8235;العدل&#8236; &#8235;كتاب&#8236; <span>(3)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="T5" name="trainee-type-filter" value="5">--}}
{{--                                    <label for="T5">--}}
{{--                                        &#8235;المحامون&#8236; <span>(5)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="trainee-item">--}}
{{--                                    <input type="radio" id="T6" name="trainee-type-filter" value="6">--}}
{{--                                    <label for="T6">--}}
{{--                                        &#8235;الموثقین&#8236; <span>(3)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <h4 class="filter-title">التصنيف</h4>--}}
{{--                            <ul class="list-cate-filter">--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="commercial_law" class="filtered" value="commercial_law">--}}
{{--                                    <label for="commercial_law">--}}
{{--                                        القانون التجاري <span>(4)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="general" class="filtered" value="general">--}}
{{--                                    <label for="general">--}}
{{--                                        عموم القضاة <span>(4)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="personal_courts" class="filtered" value="personal_courts">--}}
{{--                                    <label for="personal_courts">--}}
{{--                                        قضاة الأحوال الشخصية <span>(2)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="alaistinaf" class="filtered" value="alaistinaf">--}}
{{--                                    <label for="alaistinaf">--}}
{{--                                        قضاة الاستئناف <span>(5)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="altanfidh" class="filtered" value="altanfidh">--}}
{{--                                    <label for="altanfidh">--}}
{{--                                        قضاة التنفيذ <span>(2)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="commercial_courts" class="filtered" value="commercial_courts">--}}
{{--                                    <label for="commercial_courts">--}}
{{--                                        قضاة المحاكم التجارية <span>(3)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="criminal_courts" class="filtered" value="criminal_courts">--}}
{{--                                    <label for="criminal_courts">--}}
{{--                                        قضاة المحاكم الجزائية <span>(2)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="general_courts" class="filtered" value="general_courts">--}}
{{--                                    <label for="general_courts">--}}
{{--                                        قضاة المحاكم العامة <span>(5)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="term-item">--}}
{{--                                    <input type="checkbox" name="course-cate-filter" id="labor_courts" class="filtered" value="labor_courts">--}}
{{--                                    <label for="labor_courts">--}}
{{--                                        قضاة المحاكم العمالية <span>(2)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <h4 class="filter-title">المدرب</h4>--}}
{{--                            <ul class="list-instructor-filter">--}}
{{--                                <li class="instructor-item">--}}
{{--                                    <input type="checkbox" name="course-instructor-filter" id="1" value="1">--}}
{{--                                    <label for="1">--}}
{{--                                        د.فارس بن محمد بن عبد الله القرني <span>(29)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <h4 class="filter-title">السعر</h4>--}}
{{--                            <ul class="list-price-filter">--}}
{{--                                <li class="price-item">--}}
{{--                                    <input type="radio" id="price-filter_all" name="course-price-filter" value="all">--}}
{{--                                    <label for="price-filter_all">--}}
{{--                                        الكل <span>(29)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="price-item">--}}
{{--                                    <input type="radio" id="price-filter_free" name="course-price-filter" value="free">--}}
{{--                                    <label for="price-filter_free">--}}
{{--                                        مجانا <span>(0)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                                <li class="price-item">--}}
{{--                                    <input type="radio" id="price-filter_paid" name="course-price-filter" value="paid">--}}
{{--                                    <label for="price-filter_paid">--}}
{{--                                        دفع <span>(29)</span>--}}
{{--                                    </label>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <div class="filter-submit">--}}
{{--                                <button type="submit">بحث</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </aside>--}}
{{--                </div>--}}
                <div class="col-sm-12">
{{--                    <div class="thim-course-top switch-layout-container ">--}}
{{--                        <div class="course-index">--}}
{{--                            <span>Showing 1-3 of 3 results</span>--}}
{{--                        </div>--}}
{{--                        <div class="thim-course-order">--}}
{{--                            <select name="orderby">--}}
{{--                                <option value="newly-published">نشرت حديثا</option>--}}
{{--                                <option value="alphabetical">أبجديا</option>--}}
{{--                                <option value="most-members">عدد من أعضاء</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="courses-searching">--}}
{{--                            <form method="get">--}}
{{--                                <input type="text" value="" name="search_query" placeholder="ابحث في دوراتنا" class="form-control course-search-filter" autocomplete="off">--}}
{{--                                <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                                <span class="widget-search-close"></span>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="row">
                            @foreach($courses as $course)
                            <div class="col-sm-3">
                                <div class="course-item-wrapper">
                                    <div class="course-thumbnail">
                                        <a href="{{url('course/'.$course->id)}}"><img src="{{url($course->image != null?$course->image:'site-assets/images/2.jpg')}}" alt=""></a>
                                        <div class="price">{{$course->price}} SR</div>
                                    </div>
                                    <div class="thim-course-content">
                                        <div class="course-author">
                                            <div class="course-author-content">
                                                <img alt="" src="{{$course->instructor->image != null ? url($course->instructor->image ):asset('images/Dr_Image.jpg')}}" class="avatar avatar-96 photo">
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
                                            <span> <i class="fa fa-user"></i>{{$course->seats}} متدرب</span>
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
                </div>
            <div class="row p-4">
                <div class="container">

                    <div class="paginator">
                     {{$courses->links()}}
                    </div>

                </div>
        </div>
    </div>

    @endsection
