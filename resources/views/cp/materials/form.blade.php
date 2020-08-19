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
                             
                           

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('courses-update',['id' => $course_id])}}">{{$course->title_ar}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('materials-list',['course_id' => $course_id])}}">{{__('app.Materials')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>

                            </ol>


                            </div>

                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-classification-form" action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">{{__('app.Arabic Title')}}</label>
                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{$material->name_ar??''}}">
                                        </div>
                                        @error('name_ar')
                                            <span class="text-danger err-msg-name_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="cat_id">{{__('app.Material Type')}}</label>
                                            <select class="form-control @error('cat_id') is-invalid @enderror" id="type" name="type">
                                                <option>{{__('app.Material Type')}}</option>
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
                                            <label for="name_en">{{__('app.English Title')}}</label>
                                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{$material->name_en??''}}">
                                        </div>
                                        @error('name_en')
                                            <span class="text-danger err-msg-name_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="description">{{__('app.Details')}}</label>
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
                                                <button class="btn btn-success" type="button" id="fake-image">{{__('app.Upload Source')}}</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="margin-top: 5px;">
                                            <div class="image-preview">
                                                <span id="imageName" style="display: none; position: relative; top: 35px; left: 20px; background-color: #888; color: #FFF; padding: 7px 20px; border-radius: 5px;"></span>
                                            @error('image')
                                                <span class="text-danger err-msg-image" role="alert" style="position: relative; top: 33px; left: 20px">
                                                    <strong>يجب رفع (الملف) للدورة</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>

                                    

                                    @if(isset($material->source))
                                       <a href="{{url($material->source)}}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                    @endif
                                    
                                       


                                    </div>

                                    
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">{{__('app.Save')}}</button>
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

        $('#true-image').change(function(e){ 
            var fileName = e.target.files[0].name;
            $("#imageName").show();
            $("#imageName").text(fileName);
            $(".err-msg-image").hide();
        });
    })
</script>
