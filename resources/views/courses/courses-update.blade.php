@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'courses-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">تعديل دورة رقم ({{ $course->code }})</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-course-form" action="{{ route('update-course') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">عنوان الدورة</label>
                                            <input type="text" value="{{$course->title_ar}}" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar">
                                            <input type="hidden" name="id" value="{{ $course->id }}">
                                            <input type="hidden" name="code" value="{{ $course->code }}">
                                        </div>
                                        @error('title_ar')
                                            <span class="text-danger err-msg-title_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="cat_id">الفئة المستهدفة</label>
                                            <select class="form-control @error('cat_id') is-invalid @enderror" id="cat_id" name="cat_id">
                                                <option value="">--</option>
                                                @foreach($categories as $category)
                                                <option <?php if($course->cat_id == $category->id){ ?> selected <?php } ?> value="{{$category->id}}">{{$category->title_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('cat_id')
                                            <span class="text-danger err-msg-cat_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="price">سعر الدورة</label>
                                            <input value="{{ $course->price }}" type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="SAR">
                                        </div>
                                        @error('price')
                                            <span class="text-danger err-msg-price" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instructor_id">المحاضر</label>
                                            <select class="form-control @error('instructor_id') is-invalid @enderror" id="instructor_id" name="instructor_id">
                                                <option value="">--</option>
                                                @foreach($instructors as $instructor)
                                                <option <?php if($course->instructor_id == $instructor->id){ ?> selected <?php } ?> value="{{$instructor->id}}">{{$instructor->name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('instructor_id')
                                            <span class="text-danger err-msg-instructor_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 15px;">
                                            <label for="class_id">التصنيف</label>
                                            <select class="form-control @error('class_id') is-invalid @enderror" id="class_id" name="class_id">
                                                <option value="">--</option>
                                            </select>
                                        </div>
                                        @error('class_id')
                                            <span class="text-danger err-msg-class_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="discount">الخصم</label>
                                            <input value="{{ $course->discount }}" type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" placeholder="%">
                                        </div>
                                        @error('discount')
                                            <span class="text-danger err-msg-discount" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px 50px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="overview">نظرة عامة عن الدورة</label>
                                            <textarea class="form-control @error('overview') is-invalid @enderror" id="overview" name="overview" rows="3">{{ $course->overview }}</textarea>
                                        </div>
                                        @error('overview')
                                            <span class="text-danger err-msg-overview" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-center" style="padding: 5px 50px;">
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 5px;">
                                            <label for="class_id">نوع الدورة</label>
                                            <select class="form-control @error('class_id') is-invalid @enderror" id="type" name="type">
                                                <option value="">--</option>
                                                <option <?php if($course->type == 'recorded'){ ?> selected <?php } ?> value="recorded">دورة مسجلة</option>
                                                <option <?php if($course->type == 'face_to_face'){ ?> selected <?php } ?> value="face_to_face">حضور فعلي</option>
                                                <option <?php if($course->type == 'live'){ ?> selected <?php } ?> value="live">حضور أونلاين</option>
                                            </select>
                                        </div>
                                        @error('class_id')
                                            <span class="text-danger err-msg-class_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" id="true-image" name="image">
                                            <button class="btn btn-success" type="button" id="fake-image">رفع الصورة</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image-preview">
                                            <span id="imageName" style="display: none; position: relative; top: 35px; left: 20px; background-color: #888; color: #FFF; padding: 7px 20px; border-radius: 5px;"></span>
                                        @error('image')
                                            <span class="text-danger err-msg-image" role="alert" style="position: relative; top: 33px; left: 20px">
                                                <strong>يجب رفع (صورة) للدورة</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.dashboard-footer')

<script>
    $(document).ready(function () {
        $("#title_ar").keypress(function(){
            $(".err-msg-title_ar").hide();
            $("#title_ar").removeClass("is-invalid");
        });
        $("#instructor_id").keypress(function(){
            $(".err-msg-instructor_id").hide();
            $("#instructor_id").removeClass("is-invalid");
        });
        $("#cat_id").keypress(function(){
            $(".err-msg-cat_id").hide();
            $("#cat_id").removeClass("is-invalid");
        });
        $("#class_id").keypress(function(){
            $(".err-msg-class_id").hide();
            $("#class_id").removeClass("is-invalid");
        });
        $("#overview").keypress(function(){
            $(".err-msg-overview").hide();
            $("#overview").removeClass("is-invalid");
        });
        $("#price").keypress(function(){
            $(".err-msg-price").hide();
            $("#price").removeClass("is-invalid");
        });
        $("#discount").keypress(function(){
            $(".err-msg-discount").hide();
            $("#discount").removeClass("is-invalid");
        });
        $('#true-image').change(function(e){ 
            var fileName = e.target.files[0].name;
            $("#imageName").show();
            $("#imageName").text(fileName);
            $(".err-msg-image").hide();
        });
    });

    $(document).on("change", '#cat_id', function () {
        var stateUrl = "{{ route('class-by-cat') }}";

        $.get(stateUrl,
            {option: $(this).val()},
            function (data) {
                var model = $('#class_id');
                model.empty();
                //model.append("<option value=''>--</option>");
                $.each(data, function (index, element) {
                    model.append("<option value='" + element.id + "'>" + element.title_ar + "</option>");
                });
            }
        );
    });
</script>
