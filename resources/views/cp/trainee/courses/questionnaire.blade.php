@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_trainee', ['active' => 'trainee-courses'])
<div class="main-content">
    <div class="container-fluid">
        <div class="box box-default">
            <div class="wrapper-box">
                <div class="profile-card active">
                    @if($course->start_date <= $currentDate)
                        <div class="profile-card-body">
                                <div class="product-tabs">
                                <section style="background: #fafcfd; padding:10px;">
                                    <div class="Tab-form" style="display: block">

                                        <div class="main-content"
                                             style="padding-right: 0px; padding-top: 0px; margin-top: -10px;">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (session('invalid'))
                                                            <div class="alert alert-danger alert-dismissible fade show">
                                                                {{ session('invalid') }}
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        @endif

                                                        <div class="d-flex justify-content-between">
                                                            <h3>{{$quest->name}}</h3>
                                                            <a href="{{route("trainee-courses-view", ['id' => $course->id])}}"
                                                               class="btn btn-danger">العودة</a>
                                                        </div>
                                                        <div class="widget">
                                                            <form class="exam-form" method="POST"
                                                                  enctype="multipart/form-data"
                                                                  action="{{route('trainee-course-questionnaire-save', ['id' => $course->id, 'questId' => $quest->id])}}">
                                                                @csrf
                                                                @foreach($quest->questions as $i => $question)
                                                                    <div class="card">
                                                                        <div class="widget-header">
                                                                            <div
                                                                                class=" d-flex justify-content-between align-items-center">
                                                                                <h4 class="widget-title">{{$question->question}}</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                @switch($question->type)
                                                                                    @case('MC')
                                                                                    @foreach($question->choices as $i => $choice)
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input
                                                                                                class="form-check-input mt-0"
                                                                                                type="checkbox"
                                                                                                value="{{$i}}"
                                                                                                name="answers[{{$question->id}}][]"
                                                                                                id="{{"q_{$question->id}_{$i}"}}">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="{{"q_{$question->id}_{$i}"}}">
                                                                                                {{$choice}}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                    @break('MC')
                                                                                    @case('SC')
                                                                                    @foreach($question->choices as $i => $choice)
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input
                                                                                                class="form-check-input mt-0"
                                                                                                type="radio"
                                                                                                value="{{$i}}"
                                                                                                name="answers[{{$question->id}}]"
                                                                                                id="{{"q_{$question->id}_{$i}"}}">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="{{"q_{$question->id}_{$i}"}}">
                                                                                                {{$choice}}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                    @break('SC')
                                                                                    @case('NM')
                                                                                    @for($i=$question->min_num; $i<=$question->max_num; $i++)
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input
                                                                                                class="form-check-input mt-0"
                                                                                                type="radio"
                                                                                                value="{{$i}}"
                                                                                                name="answers[{{$question->id}}]"
                                                                                                id="{{"q_{$question->id}_{$i}"}}">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="{{"q_{$question->id}_{$i}"}}">
                                                                                                {{$i}}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endfor
                                                                                    @break('NM')
                                                                                @endswitch
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                                <button class="btn btn-primary" type="submit">
                                                                    إرسال
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
@include('cp.common.dashboard-footer')
