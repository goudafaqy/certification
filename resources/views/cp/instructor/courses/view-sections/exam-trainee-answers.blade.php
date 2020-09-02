<div class="main-content" style="padding-right: 0px; padding-top: 0px; margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                    <a class="float-left btn btn-danger"
                       href="{{route("instructor-course-{$exam->type}-trainees", ['id' => $id, 'examId' => $exam->id, 'type' => $type, 'tab' => 'exams'])}}">الرجوع</a>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <h3>{{$userExam->exam->title_ar}}</h3>
                    <h3>{{$userExam->user->name}}</h3>
                </div>
                @if (session('invalid'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('invalid') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="widget">
                    <form class="exam-form" method="POST" enctype="multipart/form-data"
                          action="{{route("instructor-course-exam-review-trainee-save", ['id' => $id, 'examId' => $exam->id, 'traineeId' => $userExam->user_id, 'type' => $type])}}">
                        @csrf
                        @php
                            $total = 0
                        @endphp
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
                                                           {{!is_null($userQuestion->answer_MC) && $userQuestion->mcCheckecd($i)?"checked":""}}
                                                           id="{{"q_{$userQuestion->id}"}}" disabled>
                                                    <label
                                                        class="form-check-label {{$userQuestion->mcCheckecd($i)?($userQuestion->mcIsCorrectAnswer($i)?"text-green":"text-red"):""}}"
                                                        for="{{"q_{$userQuestion->id}"}}">
                                                        {{$choice}}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @break('MC')

                                            @case('TF')
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" disabled value="1"
                                                       {{!is_null($userQuestion->answer_TF) && $userQuestion->answer_TF===true?"checked":""}}
                                                       id="{{"q_{$userQuestion->id}"}}">
                                                <label
                                                    class="form-check-label {{$userQuestion->answer_TF===true?($userQuestion->question->answer_TF==true?"text-green": "text-red"):""}}"
                                                    for="{{"q_{$userQuestion->id}"}}">
                                                    نعم
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" disabled value="0"
                                                       {{!is_null($userQuestion->answer_TF) && $userQuestion->answer_TF===false?"checked":""}}
                                                       id="{{"q_{$userQuestion->id}"}}">
                                                <label
                                                    class="form-check-label {{$userQuestion->answer_TF===false?($userQuestion->question->answer_TF==false?"text-green": "text-red"):""}}"
                                                    for="{{"q_{$userQuestion->id}"}}">
                                                    لا
                                                </label>
                                            </div>
                                            @break('TF')

                                            @case('OC')
                                            @if($userQuestion->question->type_OC == 'FT')
                                                <textarea disabled
                                                          name="{{"answers[{$userQuestion->id}]"}}">{{!is_null($userQuestion->answer_FT)?$userQuestion->answer_FT:""}}</textarea>
                                            @else
                                                @if(!is_null($userQuestion->answer_FU))
                                                    <a href="{{asset($userQuestion->answer_FU)}}" target="_blank">الملف
                                                        المرفق</a>
                                                @else
                                                    <p> لم يتم رفع الملف</p>
                                                @endif
                                            @endif
                                            @break('OC')
                                        @endswitch

                                        @php
                                            $answer_point = $userQuestion->graded?$userQuestion->grade:($userQuestion->isAnswerCorrect()?$userExam->exam->question_point:0);
                                            $total += $answer_point;
                                        @endphp
                                        <div>
                                            <label>الدرجة : </label>
                                            <input class="gradeInputs" type="number" min="0"
                                                   max="{{$userExam->exam->question_point}}"
                                                   name="{{"grades[{$userQuestion->id}]"}}" value="{{$answer_point}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <h3>المجموع : <span id="gradeTotalSpan">{{$total}}</span>
                            / {{$userExam->exam->question_point * $userExam->exam->questions_no}}</h3>

                        <button class="btn btn-primary exam-save-btns" type="submit">
                            حفظ
                        </button>
                        <a href="{{route("instructor-course-{$exam->type}-trainees", ['id' => $id, 'examId' => $exam->id,'type' => $type])}}"
                           class="btn btn-primary" style="background-color: #283045;" href="">العودة</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.gradeInputs').on('change', function () {
                var total = 0;
                $('.gradeInputs').each(function (input) {
                    total += parseInt($(this).val());
                });

                $("#gradeTotalSpan").html(total)
            })
        });
    </script>
@endpush
