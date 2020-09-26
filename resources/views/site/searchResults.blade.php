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
                                <div class="col-sm-3">
                                    <aside class="widget-container thim-course-filter-wrapper">
                                        <form action="{{route('courses')}}" name="thim-course-filter" method="GET" class="thim-course-filter">

                                      
                                            
                                            <h4 class="filter-title">الفئة</h4>
                                            <ul class="list-cate-filter">
                                                @foreach($categories as $category)
                                                <li class="term-item">
                                                  @if(in_array($category->id,$SelectedCategories)) 
                                                    <input type="checkbox" checked name="categories[]" id="cat{{$category->id}}" class="filtered" value="{{$category->id}}">
                                                  @else
                                                     <input type="checkbox"  name="categories[]" id="cat{{$category->id}}" class="filtered" value="{{$category->id}}">
                                                  @endif
                                                    <label for="cat{{$category->id}}">
                                                        {{$category->title}} <span>({{$category->courses()->count()}})</span>
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @if(count($classifications)>0)
                                            <h4 class="filter-title">التصنيف</h4>
                                                <ul class="list-trainee-filter">
                                                @foreach($classifications as $class)
                                                    <li class="trainee-item">
                                                 @if(in_array($class->id,$SelectedClassifications)) 
                                                        <input  type="checkbox"  checked id="class{{$class->id}}" name="classifications[]" value="{{$class->id}}">
                                                  @else
                                                        <input  type="checkbox" id="class{{$class->id}}" name="classifications[]" value="{{$class->id}}">
                                                  @endif
                                                        <label for="class{{$class->id}}">
                                                            &#8235; {{$class->title}} &#8236; <span>({{$class->courses()->count()}})</span> 
                                                        </label>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            @endif

                                           <h4 class="filter-title">المدرب</h4>
                                           <ul class="list-instructor-filter">
                                           @foreach($Instructors as $Instructor)
                                               <li class="instructor-item">
                                                   <input type="checkbox" name="instructors[]" id="instructor{{$Instructor->id}}" value="{{$Instructor->id}}">
                                                   <label for="instructor{{$Instructor->id}}">
                                                      &#8235; {{$Instructor->name_ar}} &#8236; <span>({{$Instructor->courses()->count()}})</span>
                                                    </label>
                                               </li>
                                            @endforeach
                                            </ul>
{{--                                            <h4 class="filter-title">السعر</h4>--}}
{{--                                            <ul class="list-price-filter">--}}
{{--                                                <li class="price-item">--}}
{{--                                                    <input type="radio" id="price-filter_all" name="course-price-filter" value="all">--}}
{{--                                                    <label for="price-filter_all">--}}
{{--                                                        الكل <span>(29)</span>--}}
{{--                                                    </label>--}}
{{--                                                </li>--}}
{{--                                                <li class="price-item">--}}
{{--                                                    <input type="radio" id="price-filter_free" name="course-price-filter" value="free">--}}
{{--                                                    <label for="price-filter_free">--}}
{{--                                                        مجانا <span>(0)</span>--}}
{{--                                                    </label>--}}
{{--                                                </li>--}}
{{--                                                <li class="price-item">--}}
{{--                                                    <input type="radio" id="price-filter_paid" name="course-price-filter" value="paid">--}}
{{--                                                    <label for="price-filter_paid">--}}
{{--                                                        دفع <span>(29)</span>--}}
{{--                                                    </label>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
                                            <div class="filter-submit">
                                                <button type="submit">بحث</button>
                                            </div>
                                        </form>
                                    </aside>
                                </div>
                <div class="col-sm-9">
{{--                                        <div class="thim-course-top switch-layout-container ">--}}
{{--                                            <div class="course-index">--}}
{{--                                                <span>Showing 1-3 of 3 results</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="thim-course-order">--}}
{{--                                                <select name="orderby">--}}
{{--                                                    <option value="newly-published">نشرت حديثا</option>--}}
{{--                                                    <option value="alphabetical">أبجديا</option>--}}
{{--                                                    <option value="most-members">عدد من أعضاء</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="courses-searching">--}}
{{--                                                <form method="get">--}}
{{--                                                    <input type="text" value="" name="search_query" placeholder="ابحث في دوراتنا" class="form-control course-search-filter" autocomplete="off">--}}
{{--                                                    <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                                                    <span class="widget-search-close"></span>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="row justify-content-center">
                            @if(count($courses)>0)
                            @foreach($courses as $course)
                                <div class="col-sm-4">
                                    <div class="course-item-wrapper">
                                        <div class="course-thumbnail">
                                            <a href="{{url('course/'.$course->id)}}"><img src="{{url($course->image != null?$course->image:'site-assets/images/2.jpg')}}" alt=""></a>
                                            <div class="price">{{$course->price}} ريال</div>
                                        </div>
                                        <div class="thim-course-content">
                                            <div class="course-author">
                                                <div class="course-author-content">
                                                    <img alt="" src="{{$course->instructor->image != null ? url($course->instructor->image ):asset('images/Dr_Image.jpg')}}" class="avatar avatar-96 photo">
                                                    <div class="author-contain">
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
                                                <span class="star"><i class="fa fa-star"></i> {{App\Http\Helpers\RatingHelper::GetAvgRating($course->ratings)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                             <div class="col-sm-12">
                               <h2 class="course-title" style="text-align: center;">
                                  لا يوجد نتائج للبحث
                              </h2>

                            @endif
                            </div>
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
    </div>




@endsection
