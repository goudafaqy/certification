@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'dashboard'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الدورات التدريبة الحالية </h3>
                                @if(count($currentCourses) > 0)
                                <a href="{{route('instructor-courses-list', ['type' => 'current'])}}" class="btn btn-all"> المزيد</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($currentCourses as $course)
                                <div class="col-md-6">
                                    <div class="course-box">
                                        <img src="{{url($course->image)}}" alt="" class="img-thumbnail">
                                        <div class="details">
                                            <h3><a href="{{route('instructor-courses-view',['id' => $course->id, 'type' => 'current'])}}"> {{ $course->title_ar }}</a></h3>
                                            <div class="d-flex justify-content-between price">
                                                @if($course->type == 'live')
                                                <h6 style="padding-right: 10px;">التدريب عن بعد</h6>
                                                @elseif($course->type == 'recorded')
                                                <h6 style="padding-right: 10px;">دورات مسجلة</h6>
                                                @elseif($course->type == 'face_to_face')
                                                <h6 style="padding-right: 10px;">التدريب حضورياً</h6>
                                                @else
                                                <h6 style="padding-right: 10px;">تعليم مدمج</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if(count($currentCourses) == 0)
                                <div class="col-md-12">
                                    <div class="alert alert-info" style="text-align: center;">
                                        <b class="text-center">لا يوجد دورات حالية</b>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الدورات التدريبة السابقة </h3>
                                @if(count($previousCourses) > 0)
                                <a href="{{route('instructor-courses-list', ['type' => 'past'])}}" class="btn btn-all"> المزيد</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($previousCourses as $course)
                                <div class="col-md-6 ">
                                    <div class=" course-box">
                                        <img src="{{url($course->image)}}" alt="" class="img-thumbnail">
                                        <div class="details">
                                            <h3><a href="{{route('instructor-courses-view',['id' => $course->id, 'type' => 'current'])}}"> {{ $course->title_ar }}</a></h3>
                                            <div class="d-flex justify-content-between price">
                                                @if($course->type == 'live')
                                                <h6>التدريب عن بعد</h6>
                                                @elseif($course->type == 'recorded')
                                                <h6>دورات مسجلة</h6>
                                                @elseif($course->type == 'face_to_face')
                                                <h6>التدريب حضورياً</h6>
                                                @else
                                                <h6>تعليم مدمج</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if(count($previousCourses) == 0)
                                <div class="col-md-12">
                                    <div class="alert alert-info" style="text-align: center;">
                                        <b>لا يوجد دورات سابقة</b>
                                    </div>
                                </div>
                                @endif
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
                            <img src="{{ asset('images/speaker.png') }}" style="width: 25px; height: 25px">
                        </div>
                    </div>
                    <div class="widget-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($advertisments as $item)
                                <div class="carousel-item @if($loop->index == 0) active @endif">
                                    <div class="card">
                                        <div class="news">
                                            <img src="{{ url($item->image) }}" alt="" class="img-thumbnail">
                                            <div class="details">
                                                <h3>
                                                    <a href="#">{{$item->title_ar??'' }}</a>
                                                </h3>
                                                <div class="social">
                                                    <p style="text-align: center; margin-top: 10px; color: #fff">
                                                        <i class="far fa-calendar-alt" style="color: #A58661"></i> 08/11/2020
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <ol class="carousel-indicators indect">
                                @foreach($advertisments as $item)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="@if($loop->index == 0) active @endif"></li>
                                @endforeach
                            </ol>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" style="color:#1b456b;"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" style="color:#1b456b;"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="content widget " style="margin-top:-10px">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> التقويم التدريبي</h3>

                        </div>
                    </div>
                    <div class="events-container">
                    </div>
                    <div class="calendar-container">
                        <div class="calendar">


                            <span class="year" id="label" style="color:#000 !important"></span>


                            <table id="months-table" class="months-table" style="background:#a58661;padding:10px">
                                <tbody>

                                    <tr class="months-row">

                                        <td class="month">يناير</td>
                                        <td class="month">فبراير</td>
                                        <td class="month">مارس</td>
                                        <td class="month">أبريل</td>
                                        <td class="month">مايو</td>
                                        <td class="month">يونيو</td>
                                        <td class="month">يوليو</td>
                                        <td class="month">أغسطس</td>
                                        <td class="month">سبتمبر</td>
                                        <td class="month">أكتوبر</td>
                                        <td class="month">نوفمبر</td>
                                        <td class="month">ديسمبر</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="days-table">
                                <td class="day">الأحد</td>
                                <td class="day">الاثنين</td>
                                <td class="day">الثلاثاء</td>
                                <td class="day">الأربعاء</td>
                                <td class="day">الخميس</td>
                                <td class="day">الجمعة</td>
                                <td class="day">السبت</td>
                            </table>
                            <div class="frame" style="margin-top: -2rem;">
                                <table class="dates-table">
                                    <tbody class="tbody">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> -->

            
            </div>
        </div>
    </div>
    @include('cp.common.dashboard-footer')
