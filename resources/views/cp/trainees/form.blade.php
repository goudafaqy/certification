@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'users-add'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">بيانات المتدرب</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            @if (session('deleted'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('deleted') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            <form id="add-user-form" action="{{ $route }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                      
                                    <input type="hidden" name="course" value="{{$course->id}}">
                                    
                                    <div class="form-group">
                                            <label for="title">اللقب</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$item->title??''}}" id="title" name="title" >
                                        </div>
                                        @error('title')
                                            <span class="text-danger err-msg-title" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    
                                       <div class="form-group">
                                            <label for="name_ar">الإسم باللغة العربية</label>
                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" value="{{$item->name??''}}" id="name" name="name">
                                        </div>
                                        @error('name_ar')
                                            <span class="text-danger err-msg-name_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <div class="form-group">
                                            <label for="name_ar">الإسم باللغة الانجليزية</label>
                                            <input type="text" class="form-control" value="{{$item->name_en??''}}" id="name_en" name="name_en">
                                        </div>
                                        @error('name_en')
                                            <span class="text-danger err-msg-name_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        
                                        <div class="form-group">
                                            <label for="national_id">رقم الهوية</label>
                                            <input type="text" class="form-control @error('national_id') is-invalid @enderror" value="{{$item->national_id??''}}" id="national_id" name="national_id">
                                        </div>
                                        @error('national_id')
                                            <span class="text-danger err-msg-national_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    

                                      
                                       

                                        

                                       

                                        
                                    </div>
                                    <div class="col-md-6">
                                       
                                    <div class="form-group" >
                                            <label for="mobile">رقم الجوال</label>
                                            <input type="number" class="form-control @error('mobile') is-invalid @enderror" value="{{$item->phone??''}}" id="phone" name="phone">
                                        </div>
                                        @error('username')
                                            <span class="text-danger err-msg-username" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" >
                                            <label for="email">البريد الإلكتروني</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$item->email??''}}" id="email" name="email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger err-msg-email" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                        <div class="form-group" >
                                            <label for="sex"> الجنس</label>
                                            <select  class="form-control @error('sex') is-invalid @enderror"  id="sex" name="sex">
                                            
                                            
                                                <option value="1" {{ isset($item) && $item->sex == 1 ? 'selected' :''}}>ذكر</option>
                                                <option value="0" {{ isset($item) && $item->sex == 0 ? 'selected' :''}}>أنثى</option>
                                               
                                            </select>
                                        </div>
                                        @error('sex')
                                            <span class="text-danger err-msg-email" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      

                                       

                                      
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
@include('cp.common.dashboard-footer')

<script>

    $('#birth_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });
    $(document).ready(function () {

        $('.datepicker').datepicker({
            inline: true,
            sideBySide: false,
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });

        $("#name_ar").keypress(function(){
            $(".err-msg-name_ar").hide();
            $("#name_ar").removeClass("is-invalid");
        });
        $("#username").keypress(function(){
            $(".err-msg-username").hide();
            $("#username").removeClass("is-invalid");
        });
        $("#password").keypress(function(){
            $(".err-msg-password").hide();
            $("#password").removeClass("is-invalid");
        });
        $("#role").change(function(){
            $(".err-msg-role").hide();
            $("#role").removeClass("is-invalid");
        });
        $("#name_en").keypress(function(){
            $(".err-msg-name_en").hide();
            $("#name_en").removeClass("is-invalid");
        });
        $("#email").keypress(function(){
            $(".err-msg-email").hide();
            $("#email").removeClass("is-invalid");
        });
        $("#password_confirmation").keypress(function(){
            $(".err-msg-password_confirmation").hide();
            $("#password_confirmation").removeClass("is-invalid");
        });
    })
</script>
