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
                                                <h6 style="padding-right: 10px;">حضور أونلاين</h6>
                                                @elseif($course->type == 'recorded')
                                                <h6 style="padding-right: 10px;">دورة مسجلة</h6>
                                                @elseif($course->type == 'face_to_face')
                                                <h6 style="padding-right: 10px;">حضور فعلي</h6>
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
                                                <h6>أونلاين</h6>
                                                @elseif($course->type == 'recorded')
                                                <h6>دورة مسجلة</h6>
                                                @elseif($course->type == 'face_to_face')
                                                <h6>حضور فعلي</h6>
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
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')
