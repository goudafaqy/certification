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
                                        <img src="{{asset($course->image)}}" alt="" class="img-thumbnail">
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
                                        <img src="{{asset($course->image)}}" alt="" class="img-thumbnail">
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
                                                <img src="images/albom1.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">مركز التدريب العدلي مركز التدريب العدلي</a></h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i>
                                                            09.10.2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/albom2.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">مركز التدريب العدلي مركز التدريب العدلي</a></h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i>
                                                            09.10.2019
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
                <div class="widget ">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> الشهادات التدريبة</h3>
                            <img src="images/certificate.png" style="width: 25px; height: 25px">
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="owl-container">
                                    <div class="owl-carousel certi">
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/cup.png" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">تهانينا نتيجة الدورة التدريبية </a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/cup.png" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">تهانينا نتيجة الدورة التدريبية </a></h3>
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
@include('cp.common.dashboard-footer')
