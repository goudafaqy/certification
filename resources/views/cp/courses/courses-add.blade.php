@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'courses-add'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">إضافة دورة</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 10 15px">
                            <form id="add-course-form" action="{{ route('save-course') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center" style="padding: 5px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">عنوان الدورة</label>
                                            <input type="text" value="{{ old('title_ar') }}" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar">
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
                                                <option value="{{$category->id}}">{{$category->title_ar}}</option>
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
                                            <input value="{{ old('price') }}" type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="SAR">
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
                                                <option value="{{$instructor->id}}">{{$instructor->name_ar}}</option>
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
                                            <input value="{{ old('discount') }}" type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" placeholder="%">
                                        </div>
                                        @error('discount')
                                            <span class="text-danger err-msg-discount" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 50px;">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="pass_grade">درجة النجاح</label>
                                            <input value="{{ old('pass_grade') }}" type="number" class="form-control @error('pass_grade') is-invalid @enderror" id="pass_grade" name="pass_grade">
                                        </div>
                                        @error('pass_grade')
                                            <span class="text-danger err-msg-pass_grade" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check radio-grade">
                                            <input class="form-check-input" type="radio" name="pass_unit" id="percent" value="p" checked>
                                            <label class="form-check-label" for="percent" style="position: relative; bottom: 1px; right: 5px;">
                                                نسبة %
                                            </label>
                                        </div>
                                        <div class="form-check radio-grade">
                                            <input class="form-check-input" type="radio" name="pass_unit" id="number" value="n">
                                            <label class="form-check-label" for="number" style="position: relative; bottom: 1px; right: 5px;">
                                                رقم
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-top: 15px;">
                                            <label for="skill_level">مستوى الدورة</label>
                                            <select class="form-control @error('skill_level') is-invalid @enderror" id="skill_level" name="skill_level">
                                                <option value="">--</option>
                                                <option value="b">مبتدئ</option>
                                                <option value="m">متوسط</option>
                                                <option value="a">متقدم</option>
                                            </select>
                                        </div>
                                        @error('skill_level')
                                            <span class="text-danger err-msg-skill_level" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check" style="display: inline-block; position: relative; top: 45px">
                                            <input style="cursor: pointer;" type="checkbox" class="form-check-input" id="assi_check" name="assi_check">
                                            <label style="font-size: 0.9em; position: relative; bottom: 1px; right: 5px;" class="form-check-label" for="assi_check">واجبات</label>
                                        </div>
                                        <div class="form-check" style="margin-right: 10px; display: inline-block; position: relative; top: 45px">
                                            <input style="cursor: pointer;" type="checkbox" class="form-check-input" id="exam_check" name="exam_check">
                                            <label style="font-size: 0.9em; position: relative; bottom: 1px; right: 5px;" class="form-check-label" for="exam_check">إمتحانات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reg_start_date">تاريخ بدء التسجيل</label>
                                            <div class="date" data-provide="datepicker">
                                                <input value="{{ old('reg_start_date') }}" type="text" class="form-control @error('reg_start_date') is-invalid @enderror" id="reg_start_date" name="reg_start_date">
                                            </div>
                                            
                                            @error('reg_start_date')
                                                <span class="text-danger err-msg-reg_start_date" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reg_end_date">تاريخ نهاية التسجيل</label>
                                            <div class="date" data-provide="datepicker">
                                                <input value="{{ old('reg_end_date') }}" type="text" class="form-control @error('reg_end_date') is-invalid @enderror" id="reg_end_date" name="reg_end_date">
                                            </div>
                                            
                                            @error('reg_end_date')
                                                <span class="text-danger err-msg-reg_end_date" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 50px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="overview">نظرة عامة عن الدورة</label>
                                            <textarea class="form-control @error('overview') is-invalid @enderror" id="overview" name="overview" rows="3">{{ old('overview') }}</textarea>
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
                                            <label for="seats">عدد المقاعد</label>
                                            <input value="{{ old('seats') }}" type="number" class="form-control @error('seats') is-invalid @enderror" id="seats" name="seats">
                                        </div>
                                        @error('seats')
                                            <span class="text-danger err-msg-seats" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 5px;">
                                            <label for="type">نوع الدورة</label>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                                <option value="">--</option>
                                                <option value="recorded">دورة مسجلة</option>
                                                <option value="face_to_face">حضور فعلي</option>
                                                <option value="live">حضور أونلاين</option>
                                                <option value="blended">التعليم المدمج</option>
                                            </select>
                                        </div>
                                        @error('type')
                                            <span class="text-danger err-msg-type" role="alert">
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
                                    <div class="col-md-3">
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
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')

<script>
    $('#reg_start_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });
    $('#reg_end_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });
    $(document).ready(function () {
        $('.datepicker').datepicker({
            inline: true,
            sideBySide: false,
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
        $("#title_ar").keypress(function(){
            $(".err-msg-title_ar").hide();
            $("#title_ar").removeClass("is-invalid");
        });
        $("#instructor_id").change(function(){
            $(".err-msg-instructor_id").hide();
            $("#instructor_id").removeClass("is-invalid");
        });
        $("#type").change(function(){
            $(".err-msg-type").hide();
            $("#type").removeClass("is-invalid");
        });
        $("#cat_id").change(function(){
            $(".err-msg-cat_id").hide();
            $("#cat_id").removeClass("is-invalid");
        });
        $("#class_id").change(function(){
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
        $("#seats").keypress(function(){
            $(".err-msg-seats").hide();
            $("#seats").removeClass("is-invalid");
        });
        $("#discount").keypress(function(){
            $(".err-msg-discount").hide();
            $("#discount").removeClass("is-invalid");
        });
        $("#pass_grade").keypress(function(){
            $(".err-msg-pass_grade").hide();
            $("#pass_grade").removeClass("is-invalid");
        });
        $("#skill_level").change(function(){
            $(".err-msg-skill_level").hide();
            $("#skill_level").removeClass("is-invalid");
        });
        $("#reg_end_date").change(function(){
            $(".err-msg-reg_end_date").hide();
            $("#reg_end_date").removeClass("is-invalid");
        });
        $("#reg_start_date").change(function(){
            $(".err-msg-reg_start_date").hide();
            $("#reg_start_date").removeClass("is-invalid");
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
