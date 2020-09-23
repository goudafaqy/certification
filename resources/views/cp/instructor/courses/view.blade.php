
@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'instructor-courses-'.$type])
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
                                            <h3>{{$course->title_ar}}</h3>
                                            <img src="{{url($course->image)}}" class="img-fluid" width="60" alt=""
                                                 style="width:200px !important">
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home"  role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row register-form">
                                                        <div class="col-md-6">
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"  id="basic-addon1"><img  src="{{ asset('images/cou.png') }}"   class="img-fluid"   style="width:20px !important;height:20px !important">
                                                                    <span class="lacourse">رمز الدورة</span></span>
                                                                </div>
                                                                <input id="email" required="" name="text" class="form-control" type="text"  readonly value="{{$course->code}}">
                                                            </div>

                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"  id="basic-addon1"><img  src="{{ asset('images/school.png') }}"    class="img-fluid" style="width:20px !important;height:20px !important">
                                                                            <span class="lacourse">نوع الدورة</span></span>
                                                                </div>
                                                                @if($course->type == 'live')
                                                                    <input
                                                                           class="form-control" type="text" readonly
                                                                           value="التدريب عن بعد">
                                                                @elseif($course->type == 'recorded')
                                                                    <input
                                                                           class="form-control" type="text" readonly
                                                                           value="دورات مسجلة">
                                                                @elseif($course->type == 'face_to_face')
                                                                    <input
                                                                           class="form-control" type="text" readonly
                                                                           value="التدريب حضورياً">
                                                                @else
                                                                    <input
                                                                           class="form-control" type="text" readonly
                                                                           value="تعليم مدمج">
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/calendar2.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important">
                                                                            <span class="lacourse">تاريخ بداية الدورة</span></span>
                                                                </div>
                                                                <input class="form-control" type="text" readonly
                                                                       value="{{ explode(" ",$course->start_date)[0] }}">
                                                             </div>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/calendar2.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important">
                                                                            <span class="lacourse">تاريخ نهاية الدورة</span></span>
                                                                </div>
                                                                <input  class="form-control" type="text" readonly
                                                                       value="{{ explode(" ",$course->end_date)[0] }}">
                                                            </div>
                                                        </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                    مستوى التقدم فى الدورة
                                                        <div id="course_preogress"></div>
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
                                           for="tab1"> <i class="fas fa-book-reader"></i> الكتيب التدريبى </a>
                                    </li>
                                    <li class="tab2 {{$tab == 'tab2'? 'active': ''}}">
                                        <a href="{{$tab != 'tab2'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'files']):"javascript:void(0);"}}"
                                           for="tab2"> <i class="far fa-file"></i> الملفات</a>
                                    </li>
                                    <li class="tab3 {{$tab == 'tab3'? 'active': ''}}">
                                        <a href="{{$tab != 'tab3'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'sessions']):"javascript:void(0);"}}"
                                           for="tab3"> <i class="far fa-copy"></i>  الجدول الزمنى</a>
                                    </li>
                                    <li class="tab4 {{$tab == 'tab4'? 'active': ''}}">
                                        <a href="{{$tab != 'tab4'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'questionnaires']):"javascript:void(0);"}}"
                                           for="tab4"><i class="fas fa-book-open"></i> الإستبيانات</a>
                                    </li>
                                    <li class="tab5 {{$tab == 'tab5'? 'active': ''}}">
                                        <a href="{{$tab != 'tab5'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'update']):"javascript:void(0);"}}"
                                           for="tab5"><i class="far fa-bookmark"></i> الاعلانات </a>
                                    </li>

                                    <li class="tab6 {{$tab == 'tab6'? 'active': ''}}">
                                        <a href="{{$tab != 'tab6'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'exams']):"javascript:void(0);"}}"
                                           for="tab6"> <i class="far fa-address-book"></i> الامتحانات والواجبات</a>
                                    </li>
                                    <li class="tab7 {{$tab == 'tab7'? 'active': ''}}">
                                        <a href="{{$tab != 'tab7'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'evaluations']):"javascript:void(0);"}}"
                                           for="tab7"><i class="fas fa-door-open"></i> مركز التقديرات</a>
                                    </li>
                                    <li class="tab8 {{$tab == 'tab8'? 'active': ''}}">
                                        <a href="{{$tab != 'tab8'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'trainees']):"javascript:void(0);"}}"
                                           for="tab8"><i class="fas fa-user-friends"></i> المتدربيين</a>
                                    </li>
                                    <li class="tab9 {{$tab == 'tab9'? 'active': ''}}">
                                        <a href="{{$tab != 'tab9'? route('instructor-courses-view', ['id' => $course->id, 'type' => $type, 'tab' => 'support']):"javascript:void(0);"}}"
                                           for="tab9"><i class="fas fa-life-ring"></i> الدعم الفني</a>
                                    </li>
                                </ul>
                            </nav>
                            <section style="background: #fafcfd; padding:10px;">
                                <div class="{{$tab}} Tab-form">
                                    @if($tab== 'tab1')
                                        @include('cp.instructor.courses.view-sections.guide', ['id' => $course->id, 'type'=> $type, 'guide' => $guide])
                                    @elseif($tab== 'tab2')
                                        @include('cp.instructor.courses.view-sections.files', ['id' => $course->id, 'type'=> $type, 'files' => $files])
                                    @elseif($tab== 'tab3')
                                        @include('cp.instructor.courses.view-sections.sessions', ['id' => $course->id, 'type'=> $type, 'sessions' => $sessions])
                                    @elseif($tab== 'tab4')

                                        @if(isset($action) && $action == 'form')
                                            @include('cp.instructor.courses.view-sections.questionnaire-form', ['id' => $course->id, 'type'=> $type, 'questionnaire'=> @$questionnaire])
                                        @elseif(isset($action) && $action == 'show')
                                            @include('cp.instructor.courses.view-sections.questionnaire-show', ['id' => $course->id, 'type'=> $type, 'questionnaire'=> $questionnaire])
                                        @else
                                            @include('cp.instructor.courses.view-sections.questionnaires', ['id' => $course->id, 'type'=> $type])
                                        @endif
                                    @elseif($tab== 'tab5')
                                        @include('cp.instructor.courses.view-sections.update', ['id' => $course->id, 'type'=> $type, 'updates' => $updates])
                                    @elseif($tab== 'tab6')
                                        @if(isset($action))
                                            @switch($action)
                                                @case('form')

                                                @include('cp.instructor.courses.view-sections.exam-form', ['id' => $course->id, 'type'=> $type, 'examType' => $examType])

                                                @break('form')
                                                @case('trainees')

                                                @include('cp.instructor.courses.view-sections.exam-trainees', ['id' => $course->id, 'type'=> $type, 'examType' => $examType])

                                                @break('trainees')
                                                @case('trainee-answers')

                                                @include('cp.instructor.courses.view-sections.exam-trainee-answers', ['id' => $course->id, 'type'=> $type, 'examType' => $examType])

                                                @break('trainee-answers')
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
                                        @if(isset($action) && $action == 'form')
                                            @include('cp.instructor.courses.view-sections.support-form', ['id' => $course->id, 'type'=> $type])
                                        @elseif(isset($action) && $action == 'show')
                                            @include('cp.instructor.courses.view-sections.support-ticket', ['id' => $course->id, 'type'=> $type])
                                        @else
                                            @include('cp.instructor.courses.view-sections.support', ['id' => $course->id, 'type'=> $type])
                                        @endif
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

            <script>
$(document).ready(function () {
$('#course_preogress').LineProgressbar({
  percentage: {{$progress}},
  fillBackgroundColor:'#3498db',
  backgroundColor:'#EEEEEE',
  radius:'10px',
  height:'10px',
  width:'90%'
});
});

</script>
@include('cp.instructor.courses.instructor-dialog')
@include('cp.common.dashboard-footer')
