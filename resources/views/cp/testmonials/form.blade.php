@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'testmonials-list'])
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
                                            <label for="title">اللقب</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  placeholder="" name="title" value="{{$item->title??''}}">
                                        </div>
                                        @error('title')
                                            <span class="text-danger err-msg-title" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                </div>        
                                <div class="col-md-6" >


                                    <div class="form-group" style="margin-top: 20px;">
                                        <label for="name">الاسم</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name" value="{{$item->name??''}}">
                                    </div>
                                       


                                        

                                      
                                </div>
                                </div>
                                <div class="row justify-content-center" >
                                    <div class="col-md-6">
                                     <div class="form-group" style="margin-top: 20px;">
                                            <label for="message">{{__('app.Message_ar')}}</label>
                                            <textarea class="form-control @error('message') is-invalid @enderror" placeholder=""  id="message" name="message">{{$item->message??''}}</textarea>
                                        </div>
                                        @error('message')
                                            <span class="text-danger err-msg-message" role="alert">
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
                                                <strong>يجب رفع (صورة) </strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
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
