@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'instructor-courses-'.$type])
<!-- <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="d-flex border-0">
                            <div class="p-2 flex-fill">
                                <div class="d-flex flex-column bg-light mb-3">
                                    <div class="p-2 mb-4">
                                        كود الدورة : {{$course->code}}
    </div>
    <div class="p-2 mb-4">
        اسم الدورة : {{$course->title_ar}}
    </div>
    <div class="p-2 mb-4">
        تبدأ في : {{$course->start_date}}
    </div>
    <div class="p-2 mb-4">
        تنتهي في : {{$course->end_date}}
    </div>
    <div class="p-2 mb-4">
        عدد المتدربين : {{10}}
    </div>
</div>
</div>

<div class="p-2 flex-fill">
<img src="{{asset($course->image)}}" class="img-thumbnail" style="width: 450px">
                            </div>

                            <div class="p-2 flex-fill">
                                <div class="d-flex flex-column bg-light mb-3">
                                    <div class="p-2 mb-4">
                                        واجبات :
                                        @if($course->assi_check)
    <i class="fa text-green fa-check-circle"></i>
@else
    <i class="fa text-red fa-times-circle"></i>
@endif
    </div>
    <div class="p-2 mb-4">
        امتحانات :
@if($course->exam_check)
    <i class="fa text-green fa-check-circle"></i>
@else
    <i class="fa text-red fa-times-circle"></i>
@endif
    </div>
    <div class="p-2 mb-4">
        مستوي الدورة
        : {{$course->skill_level=='a'?'متقدم':($course->skill_level=='m'?"متوسط" : "مبتدئ")}}
    </div>
    <div class="p-2 mb-4">
        <p>{{$course->overview}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="widget">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'sessions'?'active':''}}"
                                   href="{{$tab != 'sessions'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'sessions']):"javascript:void(0);"}}">
                                    الجلسات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'materials'?'active':''}}"
                                   href="{{$tab != 'materials'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'materials']):"javascript:void(0);"}}">
                                    المواد الدراسية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'books'?'active':''}}"
                                   href="{{$tab != 'books'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'books']):"javascript:void(0);"}}">
                                    كتب التدريب
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'updates'?'active':''}}"
                                   href="{{$tab != 'updates'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'updates']):"javascript:void(0);"}}">
                                    التحديثات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'exams'?'active':''}}"
                                   href="{{$tab != 'exams'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'exams']):"javascript:void(0);"}}">
                                    الامتحانات والواجبات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'evaluation'?'active':''}}"
                                   href="{{$tab != 'evaluation'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'evaluation']):"javascript:void(0);"}}">
                                    التقييم
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'trainees'?'active':''}}"
                                   href="{{$tab != 'trainees'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'trainees']):"javascript:void(0);"}}">
                                    المتدربين
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="nav-home">

                                @if($tab == 'exams')

    <div class="widget">
        <div class="card">

            <div class="row justify-content-center">
                <div class="col-md-12 table-container">
                    <div class="d-inline-flex float-left">
                        <button class="btn btn-lg btn-primary m-2"> إضافة امتحان
                            جديد
                        </button>
                        <button class="btn btn-lg btn-info m-2"> إضافة واجب جديد
                        </button>
                    </div>
                    <table id="dtBasicExample" class="table" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm text-center">#</th>
                            <th class="th-sm text-center">الامتحان/الواجب</th>
                            <th class="th-sm text-center">التاريخ</th>
                            <th class="th-sm text-center">اليوم</th>
                            <th class="th-sm text-center">البداية</th>
                            <th class="th-sm text-center">النهاية</th>
                            <th class="th-sm text-center">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
@foreach ($exams as $exam)
        <tr>
            <td class="text-center">{{ $loop->index + 1 }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">
                                                                    <a class="btn btn-info" href="#"
                                                                       data-toggle="tooltip" data-placement="top"
                                                                       title="عرض "><i
                                                                            style="position: relative; top: -2px; right: -4px"
                                                                            class="fa fa-building"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>

@endif

    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> -->
<div class="main-content">
    <div class="container-fluid">
        <div class="box box-default">
            <div class="wrapper-box">
                <div class="profile-card active">
                    <div class="profile-card-body">
                        <div class="form-course">
                            <div class="user-ragistration">
                                <div class="container register">
                                    <div class="row">
                                        <div class="col-md-3 register-left">
                                            <img src="{{asset($course->image)}}" class="img-fluid" width="60" alt=""
                                                 style="width:200px !important">
                                            <h3>{{$course->title_ar}}</h3>
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home"
                                                     role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row register-form">
                                                        <div class="col-md-6">
                                                            <h6>رقم الكورس</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/cou.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                <input id="email" required="" name="text"
                                                                       class="form-control" type="text"
                                                                       disabled value="{{$course->code}}">
                                                            </div>

                                                            <h6>نوع الكورس</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/school.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                @if($course->type == 'live')
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="حضور أونلاين">
                                                                @elseif($course->type == 'recorded')
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="دورة مسجلة">
                                                                @elseif($course->type == 'face_to_face')
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="حضور فعلي">
                                                                @else
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="تعليم مدمج">
                                                                @endif
                                                            </div>
                                                            <h6>مستوى الدورة</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/teacher.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                @if($course->type == 'b')
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="مبتدئ">
                                                                @elseif($course->type == 'm')
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="متوسط">
                                                                @else
                                                                    <input id="email" required="" name="email"
                                                                           class="form-control" type="text" disabled
                                                                           value="متقدم">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6>تاريخ بداية الكورس</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/calendar2.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                <input id="email" required="" name="email"
                                                                       class="form-control" type="text" disabled
                                                                       value="{{ $course->start_date }}">
                                                            </div>
                                                            <h6>تاريخ نهاية الكورس</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/calendar2.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                <input id="email" required="" name="email"
                                                                       class="form-control" type="text" disabled
                                                                       value="{{ $course->end_date }}">
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <div class="maxl">
                                                                    <span class="exam">اختبارات</span>
                                                                    <label class="radio inline">
                                                                        <input type="radio" name="gridRadios"
                                                                               id="gridRadios1" value="option1"
                                                                               @if($course->exam_check == 1) checked
                                                                               @endif disabled>
                                                                        <span> نعم </span>
                                                                    </label>
                                                                    <label class="radio inline">
                                                                        <input type="radio" name="gridRadios"
                                                                               id="gridRadios2" value="option1"
                                                                               @if($course->exam_check == 0) checked
                                                                               @endif disabled>
                                                                        <span>لا</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <div class="maxl">
                                                                    <span class="exam"> امتحانات</span>
                                                                    <label class="radio inline">
                                                                        <input type="radio" name="gridRadios2"
                                                                               id="gridRadios3" value="option1"
                                                                               @if($course->assi_check == 1) checked
                                                                               @endif disabled>
                                                                        <span> نعم </span>
                                                                    </label>
                                                                    <label class="radio inline">
                                                                        <input type="radio" name="gridRadios2"
                                                                               id="gridRadios4" value="option1"
                                                                               @if($course->assi_check == 0) checked
                                                                               @endif disabled>
                                                                        <span>لا</span>
                                                                    </label>
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
                        </div>
                        <div class="product-tabs">
                            <input {{$tab=='tab1'? 'checked="checked"': ''}} id="tab1" type="radio" name="pct"/>
                            <input {{$tab=='tab2'? 'checked="checked"': ''}} id="tab2" type="radio" name="pct"/>
                            <input {{$tab=='tab3'? 'checked="checked"': ''}} id="tab3" type="radio" name="pct"/>
                            <input {{$tab=='tab4'? 'checked="checked"': ''}} id="tab4" type="radio" name="pct"/>
                            <input {{$tab=='tab5'? 'checked="checked"': ''}} id="tab5" type="radio" name="pct"/>
                            <input {{$tab=='tab6'? 'checked="checked"': ''}} id="tab6" type="radio" name="pct"/>
                            <input {{$tab=='tab7'? 'checked="checked"': ''}} id="tab7" type="radio" name="pct"/>
                            <input {{$tab=='tab8'? 'checked="checked"': ''}} id="tab8" type="radio" name="pct"/>
                            <input {{$tab=='tab9'? 'checked="checked"': ''}} id="tab9" type="radio" name="pct"/>
                            <nav>
                                <ul>
                                    <li class="tab1 {{$tab == 'tab1'? 'active': ''}}">
                                        <a href="{{$tab != 'tab1'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'guide']):"javascript:void(0);"}}"
                                           for="tab1"> <img src="{{ asset('images/graph.png') }}" class="img-fluid"
                                                            width="20">الكتيب التدريبى</a>
                                    </li>
                                    <li class="tab2 {{$tab == 'tab2'? 'active': ''}}">
                                        <a href="{{$tab != 'tab2'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'files']):"javascript:void(0);"}}"
                                           for="tab2"> <img src="{{ asset('images/school.png') }}" class="img-fluid"
                                                            width="20"> الملفات</a>
                                    </li>
                                    <li class="tab3 {{$tab == 'tab3'? 'active': ''}}">
                                        <a href="{{$tab != 'tab3'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'sessions']):"javascript:void(0);"}}"
                                           for="tab3"> <img src="{{ asset('images/cal.png') }}" class="img-fluid"
                                                            width="20"> المحاضرات</a>
                                    </li>
                                    <li class="tab4 {{$tab == 'tab4'? 'active': ''}}">
                                        <a href="{{$tab != 'tab4'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'questionnaires']):"javascript:void(0);"}}"
                                           for="tab4"><img src="{{ asset('images/prof.png') }}" class="img-fluid"
                                                           width="20"> الإستبيانات</a>
                                    </li>
                                    <li class="tab5 {{$tab == 'tab5'? 'active': ''}}">
                                        <a href="{{$tab != 'tab5'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'ads']):"javascript:void(0);"}}"
                                           for="tab5"><img src="{{ asset('images/training.png') }}" class="img-fluid"
                                                           width="20"> الاعلانات </a>
                                    </li>

                                    <li class="tab6 {{$tab == 'tab6'? 'active': ''}}">
                                        <a href="{{$tab != 'tab6'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'exams']):"javascript:void(0);"}}"
                                           for="tab6"><img src="{{ asset('images/exam.png') }}" class="img-fluid"
                                                           width="20"> الامتحانات والواجبات</a>
                                    </li>
                                    <li class="tab7 {{$tab == 'tab7'? 'active': ''}}">
                                        <a href="{{$tab != 'tab7'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'evaluations']):"javascript:void(0);"}}"
                                           for="tab7"><img src="{{ asset('images/teaching.png') }}" class="img-fluid"
                                                           width="20"> مركز التقديرات</a>
                                    </li>
                                    <li class="tab8 {{$tab == 'tab8'? 'active': ''}}">
                                        <a href="{{$tab != 'tab8'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'trainees']):"javascript:void(0);"}}"
                                           for="tab8"><img src="{{ asset('images/man.png') }}" class="img-fluid"
                                                           width="20"> المتدربيين</a>
                                    </li>
                                    <li class="tab9 {{$tab == 'tab9'? 'active': ''}}">
                                        <a href="{{$tab != 'tab9'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'support']):"javascript:void(0);"}}"
                                           for="tab9"><img src="{{ asset('images/supp.png') }}" class="img-fluid"
                                                           width="20"> الدعم الفني</a>
                                    </li>
                                </ul>
                            </nav>
                            <section style="background: #fafcfd; padding:10px;">
                                <div class="{{$tab}} Tab-form">
                                    @if($tab== 'tab1')
                                        @include('cp.instructor.courses.view-sections.guide', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab2')
                                        @include('cp.instructor.courses.view-sections.files', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab3')
                                        @include('cp.instructor.courses.view-sections.sessions', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab4')
                                        @include('cp.instructor.courses.view-sections.questionnaires', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab5')
                                        @include('cp.instructor.courses.view-sections.ads', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab6')
                                        @if(isset($action))
                                            @switch($action)
                                                @case('add')

                                                @include('cp.instructor.courses.view-sections.exam-form', ['id' => $course->id, 'type'=> $type, 'examType' => $examType])

                                                @break('add')
                                                @default

                                                @include('cp.instructor.courses.view-sections.exams', ['id' => $course->id, 'type'=> $type, 'exams' => $exams])
                                            @endswitch
                                        @else
                                            @include('cp.instructor.courses.view-sections.exams', ['id' => $course->id, 'type'=> $type, 'exams' => $exams])
                                        @endif
                                    @elseif($tab== 'tab7')
                                        @include('cp.instructor.courses.view-sections.evaluations', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab8')
                                        @include('cp.instructor.courses.view-sections.trainees', ['id' => $course->id, 'type'=> $type])
                                    @elseif($tab== 'tab9')
                                        @include('cp.instructor.courses.view-sections.support', ['id' => $course->id, 'type'=> $type])
                                    @endif
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')
