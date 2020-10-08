<div class="main-content" style="padding-right: 0px; padding-top: 0px; margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3>{{$questionnaire->name}}</h3>
                    <h3>{{$questionnaire->publish_date}}</h3>
                    <h3>عدد الردود : {{$questionnaire->userAnswersCount()}}</h3>
                </div>
                <div class="widget">
                    @foreach($questionnaire->questions as $question)
                        <div class="card">
                            <div class="widget-header">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h4 class="widget-title">{{$question->question}}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    @switch($question->type)
                                        @case('MC')

                                        <div class="row">
                                            @foreach($question->choices as $i => $choice)

                                                <div class="col-md-3">
                                                    <h4>
                                                        {{$choice}} : تم أختياره {{$question->answerCount($i)}} مرات
                                                        ({{$questionnaire->userAnswersCount()==0? 0:

    ($question->answerCount($i)/$questionnaire->userAnswersCount()) * 100}}%)

                                                    </h4>
                                                </div>
                                            @endforeach

                                        </div>
                                        @break('MC')
                                        @case('SC')
                                        <div class="row">
                                            @foreach($question->choices as $i => $choice)

                                                <div class="col-md-3">
                                                    <h4>
                                                        {{$choice}} : تم أختياره {{$question->answerCount($i)}} مرات
                                                        ({{$questionnaire->userAnswersCount()==0? 0:

    ($question->answerCount($i)/$questionnaire->userAnswersCount()) * 100}}%)

                                                    </h4>
                                                </div>
                                            @endforeach
                                        </div>
                                        @break('SC')
                                        @case('NM')
                                        <div class="row">
                                            @for($i=$question->min_num; $i<=$question->max_num; $i++)
                                                <div class="col-md-3">
                                                    <h4> {{$i}} : تم أختياره {{$question->answerCount($i)}} مرات
                                                       ({{$questionnaire->userAnswersCount()==0? 0:

    ($question->answerCount($i)/$questionnaire->userAnswersCount()) * 100}}%)
                                                    </h4>
                                                </div>
                                            @endfor
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center">
                                                    <h4>مجموع : {{$question->answerNMSum()}}</h4>
                                                    <h4>متوسط : {{$question->answerNMAvg()}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @break('NM')
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
