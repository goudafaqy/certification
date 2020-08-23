<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <a class="float-left btn btn-danger"
               href="{{route('instructor-courses-view', ['id' => $id, 'type' => $type, 'tab' => 'exams'])}}">الرجوع</a>

            <form id="exam-form"
                  action="{{ route('instructor-course-exam-create', ['id' => $id, 'type' => $type, 'examType' => $examType]) }}"
                  method="POST">
                @csrf
                <div class="row justify-content-center" style="padding: 20px 50px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title_ar">العنوان باللغة العربية</label>
                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                   id="title_ar" name="title_ar" value="{{old('title_ar')}}">
                        </div>
                        @error('title_ar')
                        <span class="text-danger err-msg-title_ar" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title_en">العنوان باللغة الإنجليزية</label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                   id="title_en" name="title_en" value="{{old('title_en')}}">
                        </div>
                        @error('title_en')
                        <span class="text-danger err-msg-title_en" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="guide_ar">تفاصيل الامتحان باللغة العربية</label>
                            <textarea class="form-control @error('guide_ar') is-invalid @enderror" id="guide_ar"
                                      name="guide_ar">{{old('guide_ar')}}</textarea>
                        </div>
                        @error('guide_ar')
                        <span class="text-danger err-msg-guide_ar" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="guide_en">تفاصيل الامتحان باللغة الإنجليزية</label>
                            <textarea class="form-control @error('guide_en') is-invalid @enderror" id="guide_en"
                                      name="guide_en">{{old('guide_en')}}</textarea>
                        </div>
                        @error('guide_en')
                        <span class="text-danger err-msg-guide_en" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="questions_no">عدد الأسئلة</label>
                            <input type="text" class="form-control @error('questions_no') is-invalid @enderror"
                                   id="questions_no" name="questions_no" value="{{old('questions_no')}}">
                        </div>
                        @error('questions_no')
                        <span class="text-danger err-msg-questions_no" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="question_point">عدد نقاط السؤال</label>
                            <input type="text" class="form-control @error('question_point') is-invalid @enderror"
                                   id="question_point" name="question_point" value="{{old('question_point')}}">
                        </div>
                        @error('question_point')
                        <span class="text-danger err-msg-question_point" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration">مدة الامتحان</label>
                            <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                   id="duration" name="duration" value="{{old('duration')}}">
                        </div>
                        @error('duration')
                        <span class="text-danger err-msg-duration" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exam_date">تاريخ الامتحان</label>
                            <input type="text" class="form-control @error('exam_date') is-invalid @enderror"
                                   id="exam_date" name="exam_date" value="{{old('exam_date')}}">
                        </div>
                        @error('exam_date')
                        <span class="text-danger err-msg-duration" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_time">ساعة البداية</label>
                            <input type="text" class="form-control @error('start_time') is-invalid @enderror"
                                   id="start_time" name="start_time" value="{{old('start_time')}}">
                        </div>
                        @error('start_time')
                        <span class="text-danger err-msg-start_time" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_time">ساعة النهاية</label>
                            <input type="text" class="form-control @error('end_time') is-invalid @enderror"
                                   id="end_time" name="end_time" value="{{old('end_time')}}">
                        </div>
                        @error('end_time')
                        <span class="text-danger err-msg-end_time" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
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
