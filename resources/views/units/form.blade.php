@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'units-add'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">{{ $title }}</h3>
                                <a href="{{route('units-list',['section_id' => $section_id])}}" > <img src="{{ asset('images/add.png') }}" style="width: 20px;"> {{__('app.Units')}} </a>

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

                                        <div class="form-group" style="margin-top: 20px;">
                                        <label for="source_type">{{__('app.Material Type')}}</label>
                                            <select class="form-control @error('source_type') is-invalid @enderror" id="source_type" name="source_type">
                                                <option value="">{{__('app.Material Type')}}</option>
                                                <option <?php if( (isset($item->source_type)) && $item->source_type == 'link'){ ?> selected <?php } ?> value="link">Video Link</option>

                                                 <option <?php if( (isset($item->source_type)) && $item->source_type == 'text'){ ?> selected <?php } ?> value="text">Text</option>
                                            </select>
                                        </div>
                                        @error('source_type')
                                            <span class="text-danger err-msg-source_type" role="alert">
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




                                        <div class="form-group"  style="margin-top: 20px;">
                                            <label for="duration">{{__('app.Duration')}}</label>
                                            <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{$item->duration??''}}">
                                        </div>
                                        @error('duration')
                                            <span class="text-danger err-msg-duration" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 20px;">
                                            <label for="text">{{__('app.Content')}}</label>
                                            <textarea  class="form-control @error('text') is-invalid @enderror" id="text" name="text" />{{$item->text??''}}</textarea>
                                        </div>
                                        @error('text')
                                            <span class="text-danger err-msg-text" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="link">{{__('app.Link')}}</label>
                                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{$item->link??''}}">
                                        </div>
                                        @error('link')
                                            <span class="text-danger err-msg-text" role="alert">
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
@include('common.dashboard-footer')

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
