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

            @if (session('added'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('added') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if($course->exam_check == 1) 
               <a class="btn btn-primary m-2 text-white"
               href="{{route('instructor-course-exam-add', ['id' => $id, 'type' => $type])}}">
                إضافة امتحان جديد
              </a>
            @endif 
            @if($course->assi_check == 1)                                                 
               <a class="btn btn-primary m-2 text-white"
               href="{{route('instructor-course-assignment-add', ['id' => $id, 'type' => $type])}}">
                إضافة واجب جديد
              </a>
            @endif
            <table id="dtBasicExample" class="table course-table" width="100%">
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
                    <tr class="odd" style="color:#283045;line-height:3.5rem">

                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $exam->title_ar }}</td>
                        <td class="priority text-center">{{ $exam->exam_date }}</td>
                        <td class="priority text-center">{{ date("l", strtotime($exam->exam_date)) }}</td>
                        <td class="priority text-center">{{ $exam->start_time }}</td>
                        <td class="priority text-center">{{ $exam->end_time }}</td>
                        <td class="delete text-center" style="text-align: center;">
                            @if(\Carbon\Carbon::now() < \Carbon\Carbon::make($exam->start_date_time))
                                <a href="{{route("instructor-course-{$exam->type}-edit", ['id' => $id, 'examId' => $exam->id,'type' => $type])}}"
                                   data-toggle="tooltip" data-placement="top" title="تعديل">
                                    <i class="far fa-edit"></i>
                                </a>
                            @else
                                <a href="{{route("instructor-course-{$exam->type}-trainees", ['id' => $id, 'examId' => $exam->id,'type' => $type])}}"
                                   data-toggle="tooltip" data-placement="top" title="تصحيح">
                                    <i class="fa fa-tasks"></i>
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
