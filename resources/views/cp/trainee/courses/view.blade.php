@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_trainee', ['active' => 'trainee-courses'])
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
                                            <img src="{{url($course->image)}}" class="img-fluid" width="60" alt=""
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
                                        <a href="{{$tab != 'tab1'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'guide']):"javascript:void(0);"}}"
                                           for="tab1"> <img src="{{ asset('images/graph.png') }}" class="img-fluid"
                                                            width="20">الكتيب التدريبى</a>
                                    </li>
                                    <li class="tab2 {{$tab == 'tab2'? 'active': ''}}">
                                        <a href="{{$tab != 'tab2'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'files']):"javascript:void(0);"}}"
                                           for="tab2"> <img src="{{ asset('images/school.png') }}" class="img-fluid"
                                                            width="20"> الملفات</a>
                                    </li>
                                    <li class="tab5 {{$tab == 'tab5'? 'active': ''}}">
                                        <a href="{{$tab != 'tab5'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'ads']):"javascript:void(0);"}}"
                                           for="tab5"><img src="{{ asset('images/training.png') }}" class="img-fluid"
                                                           width="20"> الاعلانات </a>
                                    </li>

                                    <li class="tab6 {{$tab == 'tab6'? 'active': ''}}">
                                        <a href="{{$tab != 'tab6'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'exams']):"javascript:void(0);"}}"
                                           for="tab6"><img src="{{ asset('images/exam.png') }}" class="img-fluid"
                                                           width="20"> الامتحانات والواجبات</a>
                                    </li>
                                    <li class="tab7 {{$tab == 'tab7'? 'active': ''}}">
                                        <a href="{{$tab != 'tab7'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'evaluations']):"javascript:void(0);"}}"
                                           for="tab7"><img src="{{ asset('images/teaching.png') }}" class="img-fluid"
                                                           width="20"> مركز التقديرات</a>
                                    </li>
                                    <li class="tab9 {{$tab == 'tab9'? 'active': ''}}">
                                        <a href="{{$tab != 'tab9'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'support']):"javascript:void(0);"}}"
                                           for="tab9"><img src="{{ asset('images/supp.png') }}" class="img-fluid"
                                                           width="20"> الدعم الفني</a>
                                    </li>
                                </ul>
                            </nav>
                            <section style="background: #fafcfd; padding:10px;">
                                <div class="{{$tab}} Tab-form">
                                    @if($tab== 'tab1')
                                        @include('cp.trainee.courses.view-sections.guide', ['id' => $course->id, 'guide' => $guide])
                                    @elseif($tab== 'tab2')
                                        @include('cp.trainee.courses.view-sections.files', ['id' => $course->id, 'files' => $files])
                                    @elseif($tab== 'tab3')
                                        @include('cp.trainee.courses.view-sections.sessions', ['id' => $course->id, 'sessions' => $sessions])
                                    @elseif($tab== 'tab4')
                                        @include('cp.trainee.courses.view-sections.questionnaires', ['id' => $course->id])
                                    @elseif($tab== 'tab5')
                                        @include('cp.trainee.courses.view-sections.ads', ['id' => $course->id])
                                    @elseif($tab== 'tab6')
                                        @if(isset($action))
                                            @switch($action)
                                                @case('add')

                                                @include('cp.trainee.courses.view-sections.exam-form', ['id' => $course->id, 'examType' => $examType])

                                                @break('add')
                                                @default

                                                @include('cp.trainee.courses.view-sections.exams', ['id' => $course->id, 'exams' => $exams])
                                            @endswitch
                                        @else
                                            @include('cp.trainee.courses.view-sections.exams', ['id' => $course->id, 'exams' => $exams])
                                        @endif
                                    @elseif($tab== 'tab7')
                                        @include('cp.trainee.courses.view-sections.evaluations', ['id' => $course->id])
                                    @elseif($tab== 'tab8')
                                        @include('cp.trainee.courses.view-sections.trainees', ['id' => $course->id])
                                    @elseif($tab== 'tab9')
                                        @include('cp.trainee.courses.view-sections.support', ['id' => $course->id])
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
