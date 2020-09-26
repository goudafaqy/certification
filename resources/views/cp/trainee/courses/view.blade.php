@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_trainee', ['active' => 'trainee-courses'])
<div class="main-content">
    <div class="container-fluid">
        <div class="box box-default">
            <div class="wrapper-box">
                <div class="profile-card active">
                    @if($course->start_date <= $currentDate)
                        <div class="profile-card-body">
                            <div id="sliddetails"><span>اخفاء التفاصيل</span></div>
                            <div class="form-course">
                                <div class="user-ragistration">
                                    @if (session('submit'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('submit') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="container register">
                                        <div class="row">
                                            <div class="col-md-3 register-left">
                                                <img src="{{url($course->image)}}" class="img-fluid" width="60" alt=""
                                                     style="width:200px !important">
                                                <h3>{{$course->title_ar}} </h3>
                                                <div class="course-review star-review">
                                                    <section class='rating-widget'>
                                                        <div class='rating-stars text-center'>
                                                            <ul id='stars'>
                                                                <li class='star' title='Poor' data-value='1'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star' title='Fair' data-value='2'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star' title='Good' data-value='3'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star' title='Excellent' data-value='4'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star' title='WOW!!!' data-value='5'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <!--<div class='success-box'>
                                                            <div class='clearfix'></div>
                                                            تحميل الشهادة
                                                            <div class='text-message'></div>
                                                            <div class='clearfix'></div>
                                                        </div>
                                                        -->
                                                        @if($course->last_questionnaire && !$course->last_questionnaire->isUserTake())
                                                            <a href="{{route('trainee-course-questionnaire-show', ['id' => $course->id, 'questId' => $course->last_questionnaire->id])}}"
                                                               style="text-decoration: none; font-size: 20px; color: #FFCC36;"
                                                               title="{{$course->last_questionnaire->name}}">
                                                                <i class="fa fa-clipboard-check"></i>
                                                                {{$course->last_questionnaire->short_name}}
                                                            </a>
                                                        @endif
                                                    </section>
                                                </div>
                                            </div>
                                            <form id="Rateform" action="{{ route('rate_course') }}" method="POST">
                                                @csrf
                                                <input type='hidden' name='course_id' value="{{$course->id}}">
                                            </form>
                                            @php
                                                $resultRating=0;
                                                $ratingobject=App\Http\Repositories\Eloquent\CourseRatingRepo::getRateForSpecificUser($course->id,Auth::id());
                                                if(!empty($ratingobject))
                                                   $resultRating=$ratingobject->rating;
                                            @endphp
                                            <script type='text/javascript'>
                                                $(document).ready(function () {
                                                    var first = true;
                                                    $('#sliddetails span').click(function () {
                                                        $(".form-course").toggle("slow", function () {
                                                            if (first) {
                                                                $('#sliddetails span').text('أخفاء التفاصيل');
                                                                first = false;
                                                            } else {
                                                                $('#sliddetails span').text('أظهار التفاصيل');
                                                                first = true;

                                                            }
                                                        });
                                                    });

                                                    @if($resultRating ==0)
                                                    $('#stars li').on('mouseover', function () {
                                                        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
                                                        $(this).parent().children('li.star').each(function (e) {
                                                            if (e < onStar) {
                                                                $(this).addClass('hover');
                                                            } else {
                                                                $(this).removeClass('hover');
                                                            }
                                                        });

                                                    }).on('mouseout', function () {
                                                        $(this).parent().children('li.star').each(function (e) {
                                                            $(this).removeClass('hover');
                                                        });
                                                    });


                                                    /* 2. Action to perform on click */
                                                    $('#stars li').on('click', function () {
                                                        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                                                        var stars = $(this).parent().children('li.star');

                                                        for (i = 0; i < stars.length; i++) {
                                                            $(stars[i]).removeClass('selected');
                                                        }

                                                        for (i = 0; i < onStar; i++) {
                                                            $(stars[i]).addClass('selected');
                                                        }

                                                        // JUST RESPONSE (Not needed)
                                                        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                                                        var msg = "";
                                                        if (ratingValue > 1) {
                                                            msg = "شكرا! لقد اختارت " + ratingValue + " نجمات.";
                                                        } else {
                                                            msg = "شكرا! لقد اختارت " + ratingValue + " نجمة.";
                                                        }
                                                        var $form = $('#Rateform');
                                                        $form.append($('<input>').attr('type', 'hidden').attr('name', 'rating').val(ratingValue));
                                                        $.ajax({
                                                            data: $form.serialize(),
                                                            type: $form.attr('method'),
                                                            url: $form.attr('action'),
                                                            success: function (result) {
                                                                // alert(result);
                                                                $('#stars li').unbind();
                                                                return result;
                                                            }
                                                        });
                                                    });
                                                    @else

                                                    var stars = $('li.star');
                                                    for (i = 0; i < {{$resultRating}}; i++)
                                                        $(stars[i]).addClass('selected');

                                                    @endif


                                                });
                                            </script>
                                            <div class="col-md-9 register-right">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                         aria-labelledby="home-tab">
                                                        <div class="row register-form">
                                                            <div class="col-md-6">
                                                                <div class="form-group input-group">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/cou.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important">
                                                                    <span class="lacourse">رمز الدورة</span></span>
                                                                    </div>
                                                                    <input id="email" required="" name="text"
                                                                           class="form-control" type="text" readonly
                                                                           value="{{$course->code}}">
                                                                </div>

                                                                <div class="form-group input-group">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon1"><img
                                                                            src="{{ asset('images/school.png') }}"
                                                                            class="img-fluid"
                                                                            style="width:20px !important;height:20px !important">
                                                                            <span
                                                                                class="lacourse">نوع الدورة</span></span>
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
                                                                            <span
                                                                                class="lacourse">تاريخ بداية الدورة</span></span>
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
                                                                            <span
                                                                                class="lacourse">تاريخ نهاية الدورة</span></span>
                                                                    </div>
                                                                    <input class="form-control" type="text" readonly
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
                                            <a href="{{$tab != 'tab1'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'guide']):"javascript:void(0);"}}"
                                               for="tab1"><i class="fas fa-book-reader"></i> الكتيب التدريبى</a>
                                        </li>
                                        <li class="tab2 {{$tab == 'tab2'? 'active': ''}}">
                                            <a href="{{$tab != 'tab2'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'files']):"javascript:void(0);"}}"
                                               for="tab2"> <i class="far fa-file"></i> الملفات</a>
                                        </li>
                                        @if(($course->type == 'live' ) ||($course->type == 'face_to_face')||($course->type == 'blended'))
                                            <li class="tab3 {{$tab == 'tab3'? 'active': ''}}">
                                                <a href="{{$tab != 'tab3'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'sessions']):"javascript:void(0);"}}"
                                                   for="tab3"> <i class="far fa-copy"></i> الجدول الزمنى</a>
                                            </li>

                                            <li class="tab5 {{$tab == 'tab5'? 'active': ''}}">
                                                <a href="{{$tab != 'tab5'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'update']):"javascript:void(0);"}}"
                                                   for="tab5"> <i class="far fa-bookmark"></i> الاعلانات </a>
                                            </li>
                                        @endif
                                        @if(($course->type == 'recorded' ))
                                            <li class="tab7 {{$tab == 'tab7'? 'active': ''}}">
                                                <a href="{{$tab != 'tab7'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'evaluations']):"javascript:void(0);"}}"
                                                   for="tab7"> <i class="fas fa-door-open"></i> مخطط الدورة</a>
                                            </li>
                                        @endif
                                        <li class="tab6 {{$tab == 'tab6'? 'active': ''}}">
                                            <a href="{{$tab != 'tab6'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'exams']):"javascript:void(0);"}}"
                                               for="tab6"> <i class="far fa-address-book"></i> الامتحانات والواجبات</a>
                                        </li>
                                    <!--<li class="tab7 {{$tab == 'tab7'? 'active': ''}}">
                                            <a href="{{$tab != 'tab7'? route('trainee-courses-view', ['id' => $course->id, 'tab' => 'evaluations']):"javascript:void(0);"}}"
                                               for="tab7"> <i class="fas fa-door-open"></i> مركز التقديرات</a>
                                        </li>-->
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
                                            {{--                                        @elseif($tab== 'tab7')--}}
                                            {{--                                            @include('cp.trainee.courses.view-sections.evaluations', ['id' => $course->id])--}}
                                        @elseif($tab== 'tab8')
                                            @include('cp.trainee.courses.view-sections.trainees', ['id' => $course->id])
                                        @elseif($tab== 'tab9')
                                            @if(isset($action) && $action == 'form')
                                                @include('cp.trainee.courses.view-sections.support-form', ['id' => $course->id])

                                            @elseif(isset($action) && $action == 'show')
                                                @include('cp.trainee.courses.view-sections.support-ticket', ['id' => $course->id])
                                            @else
                                                @include('cp.trainee.courses.view-sections.support', ['id' => $course->id])
                                            @endif
                                        @endif
                                    </div>
                                </section>
                            </div>
                        </div>
                    @else
                        <div class="profile-card-body">
                            <div class="alert alert-info text-right" role="alert">
                                <h4 class="alert-heading">الأستاذ المتدرب <b>{{ Auth::user()->username }}</b></h4>
                                <p style="margin-top: 20px;">هذه الدورة التدريبية تبدأ بتاريخ
                                    <b>{{ $course->start_date }} <i class="fas fa-exclamation-triangle"></i></b></p>
                                <hr>
                                <p class="mb-0">لذا لن تتمكن من مشاهدة تفاصيل هذه الدورة حتى تاريخ بداية الدورة و
                                    شكراً </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
            $.ajax({
                    data: {"_token": "{{ csrf_token() }}"},
                    type: 'GET',
                    url:"{{route('traineegetCourseProgress',$course->id)}}",
                    success: function(result) {
                        $('#course_preogress').LineProgressbar({
                            percentage: result,
                            fillBackgroundColor:'#3498db',
                            backgroundColor:'#EEEEEE',
                            radius:'10px',
                            height:'10px',
                            width:'90%'
                            });
                    }
                    });   
                    
            });
</script>
@include('cp.trainee.courses.trainee-dialog')
@include('cp.common.dashboard-footer')
