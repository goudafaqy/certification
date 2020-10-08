@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'notify-list'])
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
                                
                                <div class="col-md-4">
                                <div class="form-group" style="margin-top: 20px;">
                                            <label for="sending_to">ارسال الى </label>
                                            <select  title="أختر نوع الارسال " class="form-control selectpicker" id="sending_to" name="sending_to">
                                               
                                             <option value="roles">دور وظيفى</option>
                                             <option value="users">مستخدم </option>
                                             <option value="courses">مشترك فى دورة تدريبة</option>
                                               
                                            </select>
                                </div>
                                @error('sending_to')
                                    <span class="text-danger err-msg-sending_to" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>  
                                <div class="col-md-8" id="empty" > 
                                </div>
                                <div class="col-md-8" id="roles" style="display:none">
                                <div class="form-group" style="margin-top: 20px;">
                                            <label for="role">الدور الوظيفي</label>
                                            <select multiple title="أختر الدور" class="form-control selectpicker @error('role') is-invalid @enderror" id="role" name="roles[]">
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                @error('role')
                                    <span class="text-danger err-msg-role" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>  

                                <div class="col-md-8" id="users" style="display:none">
                                <div class="form-group" style="margin-top: 20px;">
                                            <label for="users">مستخدمى النظام</label>
                                            <select multiple title="أختر الاسم" class="form-control selectpicker @error('role') is-invalid @enderror" id="user" name="users[]">
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name_ar }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                @error('role')
                                    <span class="text-danger err-msg-role" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>  


                                <div class="col-md-8" id="courses" style="display:none" >
                                <div class="form-group" style="margin-top: 20px;">
                                            <label for="role">المشاركين فى الدورة</label>
                                            <select multiple title="أختر الدورة" class="form-control selectpicker @error('role') is-invalid @enderror" id="course" name="courses[]">
                                                @foreach($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->title_ar }}</option>
                                                @endforeach
                                            </select>
                                </div>
                                @error('role')
                                    <span class="text-danger err-msg-role" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                </div>
                                <div class="row justify-content-center" >

                                <div class="col-md-6" >
                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="title_ar">{{__('app.Arabic Title')}}</label>
                                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar"  placeholder="EX : لديك دورة جديدة رقم" name="title_ar" value="{{$item->title_ar??''}}">
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
                                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" placeholder="EX : You have new course" name="title_en" value="{{$item->title_en??''}}">
                                    </div>
                                       


                                        

                                      
                                </div>
                                </div>
                                <div class="row justify-content-center" >
                                    <div class="col-md-6">
                                     <div class="form-group" style="margin-top: 20px;">
                                            <label for="message_ar">{{__('app.Message_ar')}}</label>
                                            <textarea class="form-control @error('message_ar') is-invalid @enderror" placeholder="EX : لديك دورة جديدة رقم #course# تبدأ من #date#  الى #date#"  id="message_ar" name="message_ar">{{$item->message_ar??''}}</textarea>
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
                                            <textarea class="form-control @error('message_en') is-invalid @enderror" id="message_en" placeholder="EX : You have new course #course# start from #date# to #date#" name="message_en">{{$item->message_en??''}}</textarea>
                                        </div>
                                    </div>   
                                    </div>


                                    <div class="row justify-content-center" >
                                    <div class="col-md-6">
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

                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-top: 20px;">
                                            <label for="link">الروابط</label>
                                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="link" placeholder="" name="link" value="{{$item->link??''}}">
                                            </div>

                                        

                                        </div>

                                        </div> 
                                        <div class="row justify-content-center" >
                                        <div class="col-md-12">
                                        

                                            <div class="form-group" style="margin-top: 20px;">
                                            <label for="extra_data">{{__('app.Extra Data')}}</label>
                                            <textarea class="form-control @error('extra_data') is-invalid @enderror" id="extra_text" placeholder="" name="extra_text">{{$item->extra_text??''}}</textarea>
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
