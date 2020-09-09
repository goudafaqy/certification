<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <a class="float-left btn btn-danger"
                       href="{{route('instructor-courses-view', ['id' => $id, 'type' => $type, 'tab' => 'exams'])}}">الرجوع</a>
                </div>
            </div>
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
            <h2>{{$exam->name}}</h2>
            <table class="course-view-table" style="overflow-x:auto; ">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">المتدرب</th>
                    <th class="text-center">الحالة</th>
                    <th class="text-center">وقت الاختبار</th>
                    <th class="text-center">عدد الاجابات</th>
                    <th class="text-center">النتيجة</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trainees as $trainee)
                    <tr style="color: #000">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $trainee['name'] }}</td>
                        <td class="priority text-center">{{ $trainee['status']==1?"لم يتم الاجابة":($trainee['status']==0?"تمت الاجابة":"تم الأعتماد")}}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?$trainee['userExam']->start_time:"" }}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?($trainee['numAnswered']." / ".$exam->questions_no):"" }}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?($trainee['status']==0? "لم تعتمد بعد":($trainee['userExam']->getExamGrade()." / ".$trainee['userExam']->exam->full_mark)):"" }}</td>
                        <td class="delete text-center" style="text-align: center;">
                            @if($trainee['hasExam'])
                                <a href="{{route("instructor-course-{$exam->type}-review-trainee", [
    'id' => $id, 'examId' => $exam->id, 'traineeId' => $trainee['id'], 'type' => $type])}}"
                                   data-toggle="tooltip" data-placement="top" title="تصحيح">

                                    <i class="fa {{$trainee['status']==0?"fa-tasks": 'fa-edit'}}"></i>
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
