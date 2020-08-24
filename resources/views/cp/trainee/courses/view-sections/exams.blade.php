<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">الامتحان/الواجب</th>
                    <th class="text-center">التاريخ</th>
                    <th class="text-center">البداية</th>
                    <th class="text-center">النهاية</th>
                    <th class="text-center">مدة الامتحان (دقيقة)</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($exams as $exam)
                    <tr style="color: #FFF">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $exam->title_ar }}</td>
                        <td class="priority text-center">{{ $exam->exam_date }}</td>
                        <td class="priority text-center">{{ $exam->start_time }}</td>
                        <td class="priority text-center">{{ $exam->end_time }}</td>
                        <td class="priority text-center">{{ $exam->duration }}</td>
                        <td class="delete text-center" style="text-align: center;">
                            @if($exam->status == 0)
                                <i class="fa fa-clock"></i>
                            @elseif($exam->status == 1)
                                <i class="fa fa-times" style="color: red;"></i>
                            @elseif($exam->status == 2)
                                <a class="" href="{{route('trainee-course-exam-show', ['id' => $id, 'examId' => $exam->id])}}" data-toggle="tooltip" data-placement="top" title="بدأ الامتحان">
                                    <i class="far fa-play-circle"></i>
                                </a>
                            @elseif($exam->status == 3)
                                <a class="" href="#" data-toggle="tooltip" data-placement="top" title="">
                                    <i class="fa fa-list"></i>
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
