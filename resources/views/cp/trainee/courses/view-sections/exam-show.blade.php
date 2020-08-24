<div class="main-content" style="padding-right: 0px; padding-top: 0px; margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">{{$userExam->exam->title_ar}}</h3>
                <div class="widget">

                    <form class="exam-form" method="POST" enctype="multipart/form-data"
                          action="{{route('trainee-course-exam-answer', ['id' => $id, 'examId' => $userExam->exam_id])}}">
                        @csrf
                        @foreach($userExam->answers as $i => $answer)
                            <div class="card">
                                <div class="widget-header">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <h4 class="widget-title">{{$answer->question->question_ar}}</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        @switch($answer->question->type)
                                            @case('MC')
                                            @foreach($answer->question->answers as $i => $choice)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$i}}"
                                                           id="{{"q_{$answer->id}"}}" name="{{"q_{$answer->id}"}}[]">
                                                    <label class="form-check-label" for="{{"q_{$answer->id}"}}">
                                                        {{$choice}}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @break('MC')

                                            @case('TF')
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="{{"q_{$answer->id}"}}"
                                                       id="{{"q_{$answer->id}"}}" value="1">
                                                <label class="form-check-label" for="{{"q_{$answer->id}"}}">
                                                    نعم
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="{{"q_{$answer->id}"}}"
                                                       id="{{"q_{$answer->id}"}}" value="0">
                                                <label class="form-check-label" for="{{"q_{$answer->id}"}}">
                                                    لا
                                                </label>
                                            </div>
                                            @break('TF')

                                            @case('OC')
                                            @if($answer->question->type_OC == 'FT')
                                                <textarea name="{{"q_{$answer->id}"}}"></textarea>
                                            @else
                                                <input type="file" class="form-control-file" id="{{"q_{$answer->id}"}}"
                                                       name="{{"q_{$answer->id}"}}">
                                            @endif
                                            @break('OC')
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button class="btn btn-primary" type="submit">إرسال</button>
                        <a href="{{route("trainee-courses-view", ['id' => $id, 'tab' => 'exams'])}}"
                           class="btn btn-primary" style="background-color: #283045;" href="">العودة</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
