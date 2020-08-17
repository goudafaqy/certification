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

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="{{route('courses-update',['id' => $course_id])}}">{{$course->title_ar}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('sections-list',['course_id' => $course_id])}}">{{__('app.Sections')}}</a></li>
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
                                            <label for="title_ar">{{__('app.Arabic Title')}}</label>
                                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar" value="{{$item->title_ar??''}}">
                                        </div>
                                        @error('title_ar')
                                            <span class="text-danger err-msg-title_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_en">{{__('app.English Title')}}</label>
                                            <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{$item->title_en??''}}">
                                        </div>
                                        @error('title_en')
                                            <span class="text-danger err-msg-title_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        


                                       


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
        $("#title_ar").keypress(function(){
            $(".err-msg-title_ar").hide();
            $("#title_ar").removeClass("is-invalid");
        });
        $("#title_en").keypress(function(){
            $(".err-msg-title_en").hide();
            $("#title_en").removeClass("is-invalid");
        });
        $("#cat_id").keypress(function(){
            $(".err-msg-cat_id").hide();
            $("#cat_id").removeClass("is-invalid");
        });
    })
</script>
