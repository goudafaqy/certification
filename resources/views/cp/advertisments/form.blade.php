@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'advertisments-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                             
                            <h3 class="widget-title">{{ $title }}</h3>

                            </div>

                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-classification-form" action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row justify-content-center" >

                                <div class="col-md-6" >
                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="title_ar">{{__('app.Arabic Title')}}</label>
                                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar"  placeholder="" name="title_ar" value="{{$item->title_ar??''}}">
                                        </div>
                                        @error('title_ar')
                                            <span class="text-danger err-msg-title_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                </div>        
                                <div class="col-md-6" >


                                    <div class="form-group" style="margin-top: 20px;">
                                        <label for="title_en">{{__('app.English Title')}}</label>
                                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" placeholder="" name="title_en" value="{{$item->title_en??''}}">
                                    </div>
                                       


                                        

                                      
                                </div>
                                </div>
                                <div class="row justify-content-center" >
                                    <div class="col-md-6">
                                     <div class="form-group" style="margin-top: 20px;">
                                            <label for="message_ar">{{__('app.Message_ar')}}</label>
                                            <textarea class="form-control @error('message_ar') is-invalid @enderror" placeholder=""  id="message_ar" name="message_ar">{{$item->message_ar??''}}</textarea>
                                        </div>
                                        @error('message_ar')
                                            <span class="text-danger err-msg-message_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="message_en">{{__('app.Message_en')}}</label>
                                            <textarea class="form-control @error('message_en') is-invalid @enderror" id="message_en" placeholder="" name="message_en">{{$item->message_en??''}}</textarea>
                                        </div>
                                    </div>   
                                    </div>


                                    <div class="row justify-content-center" >
                                    <div class="col-md-3">
                                    <div class="form-group">
                                            <label for="start_date">تاريخ  </label>
                                            <div class="date" data-provide="datepicker">
                                                <input  type="text" class="form-control @error('date') is-invalid @enderror" value="{{$item->date??''}}" id="start_date" name="date">
                                            </div>
                                            @error('date')
                                                <span class="text-danger err-msg-start_date" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                    
                                        </div> 

                                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_date">الوقت</label>
                                            <div class='input-group date1' id='datetimepicker3'>
                                                <input type='text' class="form-control" name="time" value="{{$item->time??''}}"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
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
                                                <strong>يجب رفع (صورة) للاعلان</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                   

                                        </div> 

                                        <div class="row justify-content-center" >
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: 20px;">
                                                <label for="location">{{__('app.location')}}</label>
                                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="" name="location" value="{{$item->location??''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                       
                                        <button style="width: 25%; margin-bottom: 50px; margin-top: 50px;" type="submit" class="btn btn-primary">{{__('app.Save & Send')}}</button>

                                    </div>

                                    
                                </div>
                            </form>
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

        $('#true-image').change(function(e){ 
            var fileName = e.target.files[0].name;
            $("#imageName").show();
            $("#imageName").text(fileName);
            $(".err-msg-image").hide();
        });

        $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    $('#start_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });

    $('#end_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });


        $("#sending_to").on('change',function(){
            
            $("#empty").hide();
            var value = $(this).val();
            if(value == 'courses'){
                $("#courses").show();
                $("#users").hide();
                $("#roles").hide();
            }
            else if(value == 'roles'){
                $("#roles").show();
                $("#users").hide();
                $("#courses").hide();
            }
            else if(value == 'users'){
                $("#users").show();
                $("#roles").hide();
                $("#courses").hide();
            }
            });
    })
</script>
