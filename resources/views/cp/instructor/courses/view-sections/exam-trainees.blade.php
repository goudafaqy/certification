<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <a class="float-left btn btn-danger"
                       href="{{route('instructor-courses-view', ['id' => $id, 'type' => $type, 'tab' => 'exams'])}}">الرجوع الى الامتحانات والواجبات</a>
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
            <table id="dtBasicExample" class="course-view-table" style="overflow-x:auto;">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">المتدرب</th>
                    <th class="text-center">الحالة</th>
                    <th class="text-center">وقت الاختبار</th>
                    <th class="text-center">الوقت المستغرق</th>
                    <th class="text-center">عدد الاجابات</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trainees as $trainee)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $trainee['name'] }}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?"تمت الاجابة":"لم يتم الاجابة"}}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?$trainee['userExam']->start_time:"" }}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?$trainee['userExam']->duration." دقيقة":"" }}</td>
                        <td class="priority text-center">{{ $trainee['hasExam']?($trainee['numAnswered']." / ".$exam->questions_no):"" }}</td>
                        <td class="delete text-center" style="text-align: center;">
                            @if($trainee['hasExam'])
                                <a href="{{route("instructor-course-{$exam->type}-review-trainee", ['id' => $id, 'examId' => $exam->id, 'traineeId' => $trainee['id'], 'type' => $type])}}"
                                   data-toggle="tooltip" data-placement="top" title="تصحيح"><i class="fa fa-tasks"></i>
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
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "searching": true ,
            "language": {
                "lengthMenu": "عرض _MENU_ طالب في الصفحة الواحدة",
                "zeroRecords": "لا يوجد طلاب",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_  طلاب)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                },},
                "order": [[ 2, "asc" ]],
                 dom: 'B<"clear">lfrtip',
                 buttons: true,
                 buttons: [],
            
        });
        $('.dataTables_length').addClass('bs-select');
    })
</script>