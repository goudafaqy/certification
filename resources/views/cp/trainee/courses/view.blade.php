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
                                            <div class="course-review star-review">
                                                <label>  تقييم البرنامج</label>
                                                <div class="flex">
                                                    <output dir="rtl" tabindex="0" role="slider" 
                                                        aria-readonly="true" aria-live="off" 
                                                        aria-valuemin="1" aria-valuemax="5" aria-valuenow="3" 
                                                        class="b-rating form-control align-items-center b-rating-inline form-control-sm d-inline-flex border-0 readonly" id="__BVID__107">
                                                        <span class="b-rating-star   b-rating-star-full">
                                                        <span class="b-rating-icon">
                                                        <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star-fill b-icon bi text-rating"><g><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-full"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star-fill b-icon bi text-rating"><g><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-full"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star-fill b-icon bi text-rating"><g><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-empty"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star b-icon bi text-rating"><g><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 00-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 00-.163-.505L1.71 6.745l4.052-.576a.525.525 0 00.393-.288l1.847-3.658 1.846 3.658a.525.525 0 00.393.288l4.052.575-2.906 2.77a.564.564 0 00-.163.506l.694 3.957-3.686-1.894a.503.503 0 00-.461 0z" clip-rule="evenodd"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-empty"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star b-icon bi text-rating"><g><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 00-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 00-.163-.505L1.71 6.745l4.052-.576a.525.525 0 00.393-.288l1.847-3.658 1.846 3.658a.525.525 0 00.393.288l4.052.575-2.906 2.77a.564.564 0 00-.163.506l.694 3.957-3.686-1.894a.503.503 0 00-.461 0z" clip-rule="evenodd"></path></g></svg></span></span><b aria-hidden="true" class="b-rating-value  ">3/5</b>
                                                    </output>
                                                </div>
                                            </div>
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
                                                            <h6>عدد المقاعد</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/man.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                <input id="email" required="" name="email"
                                                                       class="form-control" type="text" disabled
                                                                       value="{{ $course->seats }} مقعد">
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
                                                            <h6>عدد ساعات الدورة</h6>
                                                            <div class="form-group input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/medal.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important"></span>
                                                                </div>
                                                                <input id="email" required="" name="email"
                                                                       class="form-control" type="text" disabled
                                                                       value="{{ $course->course_hours }} ساعة">
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
                                           for="tab1"><i class="fas fa-book-reader"></i>  الكتيب التدريبى</a>
                                    </li>
                                    <li class="tab2 {{$tab == 'tab2'? 'active': ''}}">
                                        <a href="{{$tab != 'tab2'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'files']):"javascript:void(0);"}}"
                                           for="tab2"> <i class="far fa-file"></i> الملفات</a>
                                    </li>
                                    <li class="tab5 {{$tab == 'tab5'? 'active': ''}}">
                                        <a href="{{$tab != 'tab5'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'update']):"javascript:void(0);"}}"
                                           for="tab5"> <i class="far fa-bookmark"></i> الاعلانات </a>
                                    </li>

                                    <li class="tab6 {{$tab == 'tab6'? 'active': ''}}">
                                        <a href="{{$tab != 'tab6'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'exams']):"javascript:void(0);"}}"
                                           for="tab6"> <i class="far fa-address-book"></i> الامتحانات والواجبات</a>
                                    </li>
                                    <li class="tab7 {{$tab == 'tab7'? 'active': ''}}">
                                        <a href="{{$tab != 'tab7'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'evaluations']):"javascript:void(0);"}}"
                                           for="tab7"> <i class="fas fa-door-open"></i> مركز التقديرات</a>
                                    </li>
                                    <li class="tab9 {{$tab == 'tab9'? 'active': ''}}">
                                        <a href="{{$tab != 'tab9'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'support']):"javascript:void(0);"}}"
                                           for="tab9"><i class="fas fa-life-ring"></i> الدعم الفني</a>
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
                                        @include('cp.trainee.courses.view-sections.update', ['id' => $course->id, 'updates' => $updates])
                                    @elseif($tab== 'tab6')
                                        @if(isset($action))
                                            @switch($action)
                                                @case('show')

                                                @include('cp.trainee.courses.view-sections.exam-show', ['id' => $course->id, 'userExam' => $userExam])

                                                @break('show')
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
