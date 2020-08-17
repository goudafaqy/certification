@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'notify-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                             
                           

                            <ol class="breadcrumb">
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

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="message_ar">{{__('app.Message_ar')}}</label>
                                            <textarea class="form-control @error('message_ar') is-invalid @enderror" id="message_ar" name="message_ar">{{$item->message_ar??''}}</textarea>
                                        </div>
                                        @error('message_ar')
                                            <span class="text-danger err-msg-message_ar" role="alert">
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

                                       


                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="message_en">{{__('app.Message_en')}}</label>
                                            <textarea class="form-control @error('message_en') is-invalid @enderror" id="message_en" name="message_en">{{$item->message_en??''}}</textarea>
                                        </div>
                                        @error('message_en')
                                            <span class="text-danger err-msg-message_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="type">{{__('app.Type')}}</label>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                                <option>{{__('app.Type')}}</option>
                                                @foreach($types as $type)
                                                 <option <?php if( (isset($item->type)) && $item->type == $type){ ?> selected <?php } ?> value="{{$type}}">{{$type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('type')
                                            <span class="text-danger err-msg-type" role="alert">
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

        $('#true-image').change(function(e){ 
            var fileName = e.target.files[0].name;
            $("#imageName").show();
            $("#imageName").text(fileName);
            $(".err-msg-image").hide();
        });
    })
</script>
