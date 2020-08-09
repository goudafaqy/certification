@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'classifications-add'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">{{ $title }}</h3>
                                <a href="{{route('materials-list',['course_id' => $course_id])}}" > <img src="{{ asset('images/add.png') }}" style="width: 20px;"> {{__('app.Materials')}} </a>

                            </div>

                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-classification-form" action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">الاسم باللغة العربية</label>
                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{$material->name_ar??''}}">
                                        </div>
                                        @error('name_ar')
                                            <span class="text-danger err-msg-name_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="cat_id"> نوع المادة</label>
                                            <select class="form-control @error('cat_id') is-invalid @enderror" id="type" name="type">
                                                <option value="">أختر نوع المادة</option>
                                                @foreach($types as $type)
                                                 <option <?php if( (isset($material->type)) && $material->type == $type){ ?> selected <?php } ?> value="{{$type}}">{{$type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('cat_id')
                                            <span class="text-danger err-msg-cat_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_en">الاسم باللغة الإنجليزية</label>
                                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{$material->name_en??''}}">
                                        </div>
                                        @error('name_en')
                                            <span class="text-danger err-msg-name_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="description">التفاصيل</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{$material->description??''}}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="text-danger err-msg-description" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <div class="col-md-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            
                                            <input type="file" class="form-control-file" id="true-image" name="source">
                                            <button class="btn btn-success" type="button" id="fake-image">رفع المصدر</button>
                                           
                                        </div>

                                        
                                    </div>

                                    <br> <br>

                                    @if(isset($material->source))
                                       <a href="{{url($material->source)}}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="image-preview">
                                            <span id="imageName" style="display: none; position: relative; top: 35px; left: 20px; background-color: #888; color: #FFF; padding: 7px 20px; border-radius: 5px;"></span>
                                            @error('source')
                                            <span class="text-danger err-msg-source" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                       


                                    </div>

                                    
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
@include('common.dashboard-footer')

<script>
    $(document).ready(function () {
        $("#name_ar").keypress(function(){
            $(".err-msg-name_ar").hide();
            $("#name_ar").removeClass("is-invalid");
        });
        $("#name_en").keypress(function(){
            $(".err-msg-name_en").hide();
            $("#name_en").removeClass("is-invalid");
        });
        $("#cat_id").keypress(function(){
            $(".err-msg-cat_id").hide();
            $("#cat_id").removeClass("is-invalid");
        });
    })
</script>
