<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <a class="float-left btn btn-danger"
               href="{{route('instructor-courses-view', ['id' => $id, 'type' => $type, 'tab' => 'exams'])}}" style="margin-bottom:0.5rem">الرجوع</a>
        </div>
            <form id="exam-form"
                  action="{{ isset($exam)?
                route("instructor-course-exam-update", ['id' => $id, 'examId' => $exam->id, 'type' => $type, 'examType' => $examType]):
                route("instructor-course-exam-create", ['id' => $id, 'type' => $type, 'examType' => $examType]) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
            <div class="course_form" style="padding: 20px 20px;">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="title_ar">العنوان</label>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text course-group" id="basic-addon1"><i class="fas fa-bookmark" style="font-size:16px"></i></span>
                            </div>
                            <input required class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar" value="{{old('title_ar', @$exam->title_ar)}}" type="text">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                        <label for="questions_no">عدد الأسئلة</label>
                            <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text course-group" id="basic-addon1"><i class="fas fa-list-ol" style="font-size:16px"></i></span>
                                    </div>
                                    <input class="form-control @error('questions_no') is-invalid @enderror"
                                        id="questions_no" name="questions_no" value="{{old('questions_no', @$exam->questions_no)}}" type="text">
                                    </div>
                                    @error('questions_no')
                                    <span class="text-danger err-msg-questions_no" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                    <div class="col-lg-6">
                    <label for="question_point">نقاط كل سؤال</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text course-group" id="basic-addon1"><i class="fas fa-question" style="font-size:16px"></i></span>
                                    </div>
                                    <input class="form-control @error('question_point') is-invalid @enderror"
                                        id="question_point" name="question_point" value="{{old('question_point', @$exam->question_point)}}" type="text">
                                    </div>
                                @error('question_point')
                                <span class="text-danger err-msg-question_point" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                    <label for="duration">مدة الامتحان</label>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text course-group" id="basic-addon1"><i class="far fa-clock" style="font-size:13px"></i></span>
                                    </div>
                                    <input  type="number"  class="form-control @error('duration') is-invalid @enderror"
                                        id="duration" name="duration" value="{{old('duration', @$exam->duration)}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="background: #ebf0f3;font-size: 14px;color: #34405a;">MM</span>
                                    </div>
                                </div>
                                @error('duration')
                                <span class="text-danger err-msg-duration" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="col-lg-3">
                    <label for="exam_date">تاريخ الامتحان</label>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text icon-dates" id="basic-addon1"><i class="fas fa-calendar-week"></i></span>
                                        </div>
                                            <input placeholder="التاريخ" class="form-control  @error('exam_date') is-invalid @enderror"
                                            id="exam_date" name="exam_date" value="{{old('exam_date', @$exam->exam_date)}}" type="date" style=" padding-right:50px !important; ">
                                    </div>
                                            @error('exam_date')
                                            <span class="text-danger err-msg-duration" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                    </div>
                    <div class="col-lg-3">

                        <label for="start_time">ساعة البداية</label>
                            <div class="input-group date1" id="datetimepicker3">
                            <span class="input-group-addon addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                <input type="text" class="form-control @error('start_time') is-invalid @enderror"
                                   id="start_time" name="start_time" value="{{old('start_time', @$exam->start_time)}}">
                            </div>
                        </div>
                        @error('start_time')
                        <span class="text-danger err-msg-start_time" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="col-lg-3">

                    <label for="end_time">ساعة النهاية</label>
                    <div class="input-group date1" id="datetimepicker4">
                        <span class="input-group-addon addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                       id="end_time" name="end_time" value="{{old('end_time', @$exam->end_time)}}">

                    </div>
                </div>
                @error('end_time')
                <span class="text-danger err-msg-end_time" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <label for="guide_ar">تفاصيل</label>
                                    <label class="ui-form-input-container">
                                        <textarea class="ui-form-input @error('guide_ar') is-invalid @enderror" id="guide_ar"
                                            name="guide_ar">{{old('guide_ar', @$exam->guide_ar)}}</textarea>
                                        <span class="form-input-label text-area"><i class="fas fa-book-open" style="font-size:16px;color:#283045"></i></span>
                                    </label>

                                        @error('guide_ar')
                                        <span class="text-danger err-msg-guide_ar" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>
                        <div class="col-lg-6">
                        <label for="questions">الاسئلة</label>
                                    <div class="file-upload" style="margin-top:1rem">
                                        <div class="file-select">
                                            <div class="file-select-button" id="fileName">اختر ملف</div>
                                                <div class="file-select-name" id="noFile">No file chosen...</div>
                                                    <input type="file" name="chooseFile" id="chooseFile">
                                                </div>
                                            </div>
                                             @error('questions')
                                            <span class="text-danger err-msg-questions" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                    </div>

                </div>





            </div>
            </div>

<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    $('#start_time').on('change', function(ev){
        $('.datepicker-inline').hide();
    });

    $('#end_time').on('change', function(ev){
        $('.datepicker-inline').hide();
    });

    $(document).ready(function () {

        $('.datepicker').datepicker({
            inline: true,
            sideBySide: false,
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });

        $('[data-toggle="tooltip"]').tooltip();
        $('#dtBasicExample').DataTable({
            "searching": false ,
            "language": {
                "lengthMenu": "عرض _MENU_ موعد في الصفحة الواحدة",
                "zeroRecords": "لا يوجد مواعيد",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد",
                "infoFiltered": "(نتيجة البحث من _MAX_ موعد)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                }
            }
        });
        $('.dataTables_length').addClass('bs-select');
    });

    $(document).on('click', 'a#delete', function(e) {
        e.preventDefault();
        Swal.fire({
        title: 'هل أنت متأكد ؟',
        text: "لن تتمكن من التراجع عن هذا!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.value) {
                window.location = $(this).attr('href');
            }
        })
    });
</script>

