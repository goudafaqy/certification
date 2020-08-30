<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary m-2 text-white"
               href="{{route('instructor-course-exam-add', ['id' => $id, 'type' => $type])}}">
                إضافة امتحان جديد
            </a>
            <a class="btn btn-primary m-2 text-white"
               href="{{route('instructor-course-assignment-add', ['id' => $id, 'type' => $type])}}">
                إضافة واجب جديد
            </a>
            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">الامتحان/الواجب</th>
                    <th class="text-center">التاريخ</th>
                    <th class="text-center">اليوم</th>
                    <th class="text-center">البداية</th>
                    <th class="text-center">النهاية</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($exams as $exam)
                    <tr style="color: #FFF">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $exam->title_ar }}</td>
                        <td class="priority text-center">{{ $exam->exam_date }}</td>
                        <td class="priority text-center">{{ date("l", strtotime($exam->exam_date)) }}</td>
                        <td class="priority text-center">{{ $exam->start_time }}</td>
                        <td class="priority text-center">{{ $exam->end_time }}</td>
                        <td class="delete text-center" style="text-align: center;">
                            <a class="" href="#" data-toggle="tooltip" data-placement="top" title="عرض ">
                                <i class="far fa-play-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
