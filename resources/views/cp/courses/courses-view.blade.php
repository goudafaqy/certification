@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'courses-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">عرض دورة رقم ({{ $course->code }})</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-right" style="padding: 5px 50px;">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 5px;">
                                    <label for="seats">رمز الدورة</label>
                                    <input readonly value="{{ $course->code }}" type="text" class="form-control" id="code" name="code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="course-thumbnail">
                                <img src="{{url($course->image)}}" class="attachment-full size-full wp-post-image img-fluid" style=" border-radius: 8px;">
                                </div>
                            </div>
                            </div>
                                <div class="row justify-content-center" style="padding: 5px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">عنوان الدورة</label>
                                            <input type="text" readonly value="{{$course->title_ar}}" class="form-control" id="title_ar" name="title_ar">
                                    
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="title_en">العنوان بالانجليزية</label>
                                            <input readonly value="{{$course->title_en}}" type="text" class="form-control" id="title_en" name="title_en" >
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row justify-content-center" style="padding: 5px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instructor_id">المحاضر</label>
                                            <input readonly class="form-control" id="instructor_id" name="instructor_id" 
                                            @foreach($instructors as $instructor)
                                                 <?php if($course->instructor_id == $instructor->id){ ?>  
                                                  value="{{$instructor->name_ar}}"
                                                 <?php } ?>
                                            @endforeach
                                            >
                                            
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group" >
                                            <label for="price">سعر الدورة</label>
                                            <input readonly value="{{ $course->price }}" type="number" class="form-control" id="price" name="price" placeholder="SAR">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                    <div class="form-group" >
                                            <label for="discount">الخصم</label>
                                            <input readonly value="{{ $course->discount }}" type="number" class="form-control" id="discount" name="discount" placeholder="%">
                                        </div>
                                     </div>
                                   </div> 
                                   <div class="row justify-content-center" style="padding: 5px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="cat_id">الفئة المستهدفة</label>
                                            <input readonly type="text" class="form-control" id="cat_id" name="cat_id" 
                                                @foreach($categories as $category)
                                                 @if($course->cat_id == $category->id)  value="{{$category->title_ar}}" @endif
                                                @endforeach
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="class_id">التصنيف</label>
                                            <input readonly type="text" class="form-control" id="class_id" name="class_id" 
                                                @foreach($classifications as $classification)
                                                 @if($course->class_id == $classification->id)
                                                  value="{{$classification->title_ar}}""
                                                  @endif
                                                @endforeach
                                                >
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px 50px;">
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="pass_grade">درجة النجاح</label>
                                            <input readonly value="{{ $course->pass_grade }}" type="number" class="form-control" id="pass_grade" name="pass_grade">
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin:-15px 0px;">
                                        <div class="form-check radio-grade">
                                            @if($course->pass_unit == 'p')
                                                <input readonly class="form-check-input" type="radio" name="pass_unit" id="percent" value="p" checked>
                                            @else
                                                <input readonly class="form-check-input" type="radio" name="pass_unit" id="percent" value="p">
                                            @endif
                                            <label class="form-check-label" for="percent" style="position: relative; bottom: 1px; right: 5px;">
                                                نسبة %
                                            </label>
                                        </div>
                                        <div class="form-check radio-grade">
                                            @if($course->pass_unit == 'n')
                                                <input readonly class="form-check-input" type="radio" name="pass_unit" id="number" value="n" checked>
                                            @else
                                                <input readonly class="form-check-input" type="radio" name="pass_unit" id="number" value="n">
                                            @endif
                                            <label class="form-check-label" for="number" style="position: relative; bottom: 1px; right: 5px;">
                                                رقم
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label for="skill_level">مستوى الدورة</label>
                                            <input type="text" readonly class="form-control" id="skill_level" name="skill_level" value="{{$course_skill_level}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin:-15px 0px;">
                                        <div class="form-check" style="display: inline-block; position: relative; top: 45px">
                                            @if($course->assi_check)
                                                <input readonly checked style="cursor: pointer;" type="checkbox" class="form-check-input" id="assi_check" name="assi_check">
                                            @else
                                                <input readonly style="cursor: pointer;" type="checkbox" class="form-check-input" id="assi_check" name="assi_check">
                                            @endif
                                            <label style="font-size: 0.9em; position: relative; bottom: 1px; right: 5px;" class="form-check-label" for="assi_check">واجبات</label>
                                        </div>
                                        <div class="form-check" style="margin-right: 10px; display: inline-block; position: relative; top: 45px">
                                            @if($course->exam_check)
                                                <input readonly checked style="cursor: pointer;" type="checkbox" class="form-check-input" id="exam_check" name="exam_check">
                                            @else
                                                <input readonly style="cursor: pointer;" type="checkbox" class="form-check-input" id="exam_check" name="exam_check">
                                            @endif
                                            <label style="font-size: 0.9em; position: relative; bottom: 1px; right: 5px;" class="form-check-label" for="exam_check">إمتحانات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px 50px;">
                                    <div class="col-md-6">
                                        <label for="start_date" style="font-size:11px">تاريخ بدء التسجيل</label>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text icon-dates" id="basic-addon1"><i class="fas fa-calendar-week"></i></span> 
                                            </div>
                                            <input readonly value="{{ $course->reg_start_date }}" class="form-control"  id="date" name="reg_start_date" style=" padding-right:50px !important; ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="start_date" style="font-size:11px">تاريخ نهاية التسجيل</label>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text icon-dates" id="basic-addon1"><i class="fas fa-calendar-week"></i></span> 
                                            </div>
                                            <input readonly value="{{ $course->reg_end_date }}" class="form-control"  name="reg_end_date" id="date" style=" padding-right:50px !important; ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px 50px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="overview">نظرة عامة عن الدورة</label>
                                            <textarea readonly class="form-control" id="overview" name="overview" rows="8">{{ $course->overview }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 5px 50px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="objective">أهداف الدورة</label>
                                            <textarea readonly class="form-control" id="objective" name="objective" rows="8">{{ $course->objective }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-right" style="padding: 5px 50px;">
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 5px;">
                                            <label for="seats">عدد المقاعد</label>
                                            <input readonly value="{{ $course->seats }}" type="number" class="form-control" id="seats" name="seats">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 5px;">
                                            <label for="type">نوع الدورة</label>
                                            <input readonly class="form-control" id="type" name="type" value="{{$course_type}}">
                                        </div>
                                    </div>
                                </div>        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')
