<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <a class="float-left btn btn-danger"
               href="{{route('instructor-courses-view', ['id' => $id, 'type' => $type, 'tab' => 'exams'])}}">الرجوع</a>

            <form id="exam-form"
                  action="{{ isset($exam)?
route("instructor-course-exam-update", ['id' => $id, 'examId' => $exam->id, 'type' => $type, 'examType' => $examType]):
route("instructor-course-exam-create", ['id' => $id, 'type' => $type, 'examType' => $examType]) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center" style="padding: 20px 50px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title_ar">العنوان</label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                   id="title_ar" name="title_ar" value="{{old('title_ar', @$exam->title_ar)}}">
                        </div>
                        @error('title_ar')
                        <span class="text-danger err-msg-title_ar" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="guide_ar">تفاصيل</label>
                            <textarea class="form-control @error('guide_ar') is-invalid @enderror" id="guide_ar"
                                      name="guide_ar">{{old('guide_ar', @$exam->guide_ar)}}</textarea>
                        </div>
                        @error('guide_ar')
                        <span class="text-danger err-msg-guide_ar" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="questions_no">عدد الأسئلة</label>
                            <input type="number" class="form-control @error('questions_no') is-invalid @enderror"
                                   id="questions_no" name="questions_no"
                                   value="{{old('questions_no', @$exam->questions_no)}}">
                        </div>
                        @error('questions_no')
                        <span class="text-danger err-msg-questions_no" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="question_point">نقاط كل سؤال</label>
                            <input type="number" class="form-control @error('question_point') is-invalid @enderror"
                                   id="question_point" name="question_point"
                                   value="{{old('question_point', @$exam->question_point)}}">
                        </div>
                        @error('question_point')
                        <span class="text-danger err-msg-question_point" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="duration">مدة الامتحان</label>
                            <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                   id="duration" name="duration" value="{{old('duration', @$exam->duration)}}">
                        </div>
                        @error('duration')
                        <span class="text-danger err-msg-duration" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exam_date">تاريخ الامتحان</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text icon-dates" id="basic-addon1"><i
                                        class="fas fa-calendar-week"></i></span>
                            </div>
                            <input type="date" class="form-control @error('exam_date') is-invalid @enderror"
                                   id="exam_date" name="exam_date" value="{{old('exam_date', @$exam->exam_date)}}">
                        </div>
                        @error('exam_date')
                        <span class="text-danger err-msg-duration" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_time">ساعة البداية</label>
                            <div class='input-group date1' id='exam_start_time'>
                                <input type="text" class="form-control @error('start_time') is-invalid @enderror"
                                       id="start_time" name="start_time"
                                       value="{{old('start_time', @$exam->start_time)}}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        @error('start_time')
                        <span class="text-danger err-msg-start_time" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end_time">ساعة النهاية</label>
                            <div class='input-group date1' id='exam_end_time'>
                                <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                                       id="end_time" name="end_time" value="{{old('end_time', @$exam->end_time)}}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        @error('end_time')
                        <span class="text-danger err-msg-end_time" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="questions">الاسئلة</label>
                            <input type="file" class="form-control @error('questions') is-invalid @enderror"
                                   id="questions" name="questions">
                        </div>
                        @error('questions')
                        <span class="text-danger err-msg-questions" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#exam_start_time').datetimepicker({
                format: 'HH:mm'
            });
            $('#exam_end_time').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
@endpush
