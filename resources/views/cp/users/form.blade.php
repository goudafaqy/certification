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
                                <h3 class="widget-title">إضافة مستخدم</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-user-form" action="{{ route('save-user') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">الإسم باللغة العربية</label>
                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar') }}" id="name_ar" name="name_ar">
                                        </div>
                                        @error('name_ar')
                                            <span class="text-danger err-msg-name_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    

                                        <div class="form-group" >
                                            <label for="mobile">رقم الجوال</label>
                                            <input type="number" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" id="mobile" name="mobile">
                                        </div>
                                        @error('username')
                                            <span class="text-danger err-msg-username" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" >
                                            <label for="email">البريد الإلكتروني</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger err-msg-email" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                       

                                        

                                       

                                        
                                    </div>
                                    <div class="col-md-6">
                                       

                                        

                                        <div class="form-group" >
                                            <label for="password">كلمة المرور</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger err-msg-password" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        
                                        <div class="form-group" >
                                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                        </div>

                                        @error('password_confirmation')
                                            <span class="text-danger err-msg-password_confirmation" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" >
                                            <label for="role">الدور الوظيفى</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="admin">مدير نظام</option>
                                                <option value="course">مدخل الدورات</option>
                                            </select>
                                        </div>
                                        @error('role')
                                            <span class="text-danger err-msg-role" role="alert">
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
