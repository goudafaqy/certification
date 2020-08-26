<div class="outer-container">
    <div class="row">
        <div class="col-12">
            @if (session('invalid'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('invalid') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('submit'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('submit') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">الامتحان/الواجب</th>
                    <th class="text-center">التاريخ</th>
                    <th class="text-center">اخر موعد الاختبار</th>
                    <th class="text-center">مدة الاختبار (دقيقة)</th>
                    <th class="text-center">وقت بدأ الاختبار</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($exams as $exam)
                    <tr style="color: #FFF">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $exam->title_ar }}</td>
                        <td class="priority text-center">{{ $exam->exam_date." ". $exam->start_time.":00"}}</td>
                        <td class="priority text-center">{{ $exam->exam_date." ". $exam->end_time.":00" }}</td>
                        <td class="priority text-center">{{ $exam->duration }}</td>
                        <td class="priority text-center">
                            @if($exam->user_start_time)
                                {{$exam->user_start_time}} {{$exam->time_spent?"({$exam->time_spent} د)":""}}
                            @else
                                {{$exam->status == 1?'انتهي الوقت':'لم يبدأ بعد'}}
                            @endif
                        </td>
                        <td class="delete text-center" style="text-align: center;">
                            @if($exam->status == 0)
                                <i class="fa fa-clock"></i>
                            @elseif($exam->status == 1)
                                <i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="انتهى الاختبار"
                                   style="color: red;"></i>
                                @if($exam->time_spent)
                                    <a class="" data-toggle="tooltip" data-placement="top" title="مشاهدة الاجابات"
                                       href="{{route('trainee-course-exam-show', ['id' => $id, 'examId' => $exam->id])}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            @elseif($exam->status == 2)
                                <a class="" data-toggle="tooltip" data-placement="top" title="بدأ الاختبار"
                                   href="{{route('trainee-course-exam-show', ['id' => $id, 'examId' => $exam->id])}}">
                                    <i class="far fa-play-circle"></i>
                                </a>
                            @elseif($exam->status == 3)
                                <a class="" data-toggle="tooltip" data-placement="top" title="استكمال الاختبار"
                                   href="{{route('trainee-course-exam-show', ['id' => $id, 'examId' => $exam->id])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @elseif($exam->status == 4)
                                <a class="" data-toggle="tooltip" data-placement="top" title="مشاهدة الاجابات"
                                   href="{{route('trainee-course-exam-show', ['id' => $id, 'examId' => $exam->id])}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
