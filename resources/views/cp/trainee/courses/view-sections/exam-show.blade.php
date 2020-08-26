<div class="main-content" style="padding-right: 0px; padding-top: 0px; margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3>{{$userExam->exam->title_ar}}</h3>
                    <h3 id="exam_time_spent" style="color: green"></h3>
                </div>
                <div class="widget">
                    @if (session('saved'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('saved') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="exam-form" method="POST" enctype="multipart/form-data"
                          action="{{route('trainee-course-exam-answer', ['id' => $id, 'examId' => $userExam->exam_id])}}">
                        @csrf
                        @foreach($userExam->userQuestions as $i => $userQuestion)
                            <div class="card">
                                <div class="widget-header">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <h4 class="widget-title">{{$userQuestion->question->question_ar}}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        @switch($userQuestion->question->type)
                                            @case('MC')
                                            @foreach($userQuestion->question->choices as $i => $choice)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$i}}"
                                                           name="{{"answers[{$userQuestion->id}]"}}[]"
                                                           {{!is_null($userQuestion->answer_MC) && $userQuestion->mcCheckecd($i)?"checked":""}}
                                                           {{$userExam->submitted?'disabled':""}}
                                                           id="{{"q_{$userQuestion->id}"}}">
                                                    <label class="form-check-label" for="{{"q_{$userQuestion->id}"}}">
                                                        {{$choice}}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @break('MC')

                                            @case('TF')
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="{{"answers[{$userQuestion->id}]"}}"
                                                       {{!is_null($userQuestion->answer_TF) && $userQuestion->answer_TF?"checked":""}}
                                                       {{$userExam->submitted?'disabled':""}}
                                                       id="{{"q_{$userQuestion->id}"}}" value="1">
                                                <label class="form-check-label" for="{{"q_{$userQuestion->id}"}}">
                                                    نعم
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="{{"answers[{$userQuestion->id}]"}}"
                                                       {{!is_null($userQuestion->answer_TF) && !$userQuestion->answer_TF?"checked":""}}
                                                       {{$userExam->submitted?'disabled':""}}
                                                       id="{{"q_{$userQuestion->id}"}}" value="0">
                                                <label class="form-check-label" for="{{"q_{$userQuestion->id}"}}">
                                                    لا
                                                </label>
                                            </div>
                                            @break('TF')

                                            @case('OC')
                                            @if($userQuestion->question->type_OC == 'FT')
                                                <textarea {{$userExam->submitted?'disabled':""}}
                                                          name="{{"answers[{$userQuestion->id}]"}}">{{!is_null($userQuestion->answer_FT)?$userQuestion->answer_FT:""}}</textarea>
                                            @else
                                                <input {{$userExam->submitted?'disabled':""}} type="file"
                                                       class="form-control-file"
                                                       id="{{"q_{$userQuestion->id}"}}"
                                                       name="{{"answers[{$userQuestion->id}]"}}">
                                                @if(!is_null($userQuestion->answer_FU))
                                                    <a href="{{asset($userQuestion->answer_FU)}}" target="_blank">الملف
                                                        المرفق</a>
                                                @endif
                                            @endif
                                            @break('OC')
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if(!$userExam->submitted)
                            <button class="btn btn-primary exam-save-btns" type="submit" name="action" value="save">حفظ</button>
                            <button class="btn btn-primary exam-save-btns" type="submit" name="action" value="submit">إرسال</button>
                        @endif
                        <a href="{{route("trainee-courses-view", ['id' => $id, 'tab' => 'exams'])}}"
                           class="btn btn-primary" style="background-color: #283045;" href="">العودة</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        var the_interval = null;
        $(document).ready(function () {
            var dateToFinished = new Date("{{\Carbon\Carbon::make($userExam->start_time)->addMinutes($userExam->exam->duration)->format("Y-m-d H:i:s")}}");

            the_interval = setInterval(function () {
                var now = new Date().getTime();
                var distance = dateToFinished.getTime() - now;

                if(distance<=0){
                    clearInterval(the_interval);
                    $('.exam-save-btns').remove();
                    $('#exam_time_spent').css('color', 'red').html('00:00');
                }else {
                    if(distance <= 1000 *60* 5) { //5 minutes
                        $('#exam_time_spent').css('color', 'red');
                    }
                    distance = Math.floor(distance / 1000);
                    var seconds = Math.floor(distance % 60);

                    distance = Math.floor(distance / 60);
                    var minutes = Math.floor(distance % 60);

                    distance = Math.floor(distance / 60);
                    var hours = Math.floor(distance);

                    var txt = "";
                    if (hours > 0) {
                        txt += hours < 10 ? '0' + hours.toString() : hours.toString();
                        txt += ":"
                    }

                    txt += minutes < 10 ? '0' + minutes.toString() : minutes.toString();
                    txt += ":";
                    txt += seconds < 10 ? '0' + seconds.toString() : seconds.toString();

                    $('#exam_time_spent').html(txt);
                }
            }, 1000)
        });
    </script>
@endpush
