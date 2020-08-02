@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'users-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">تعديل بيانات مستخدم</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-user-form" action="{{ route('update-user') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">الإسم باللغة العربية</label>
                                            <input type="text" value="{{$user->name_ar}}" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar">
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                        </div>
                                        @error('name_ar')
                                            <span class="text-danger err-msg-name_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="username">اسم المستخدم</label>
                                            <input type="text" value="{{$user->username}}" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
                                        </div>
                                        @error('username')
                                            <span class="text-danger err-msg-username" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="password">كلمة المرور</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger err-msg-password" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="role">الدور الوظيفي</label>
                                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                                <option value="">--</option>
                                                @if ($user->role == 'admin')
                                                    <option value="admin" selected>مدير النظام</option>
                                                @else
                                                    <option value="admin">مدير النظام</option>
                                                @endif
                                                @if ($user->role == 'instructor')
                                                    <option value="instructor" selected>مدرب</option>
                                                @else
                                                    <option value="instructor">مدرب</option>
                                                @endif
                                                @if ($user->role == 'trainee')
                                                    <option value="trainee" selected>متدرب</option>
                                                @else
                                                    <option value="trainee">متدرب</option>
                                                @endif
                                                @if ($user->role == 'editor')
                                                    <option value="editor" selected>مسؤول محتوى</option>
                                                @else
                                                    <option value="editor">مسؤول محتوى</option>
                                                @endif
                                            </select>
                                        </div>
                                        @error('role')
                                            <span class="text-danger err-msg-role" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_en">الإسم باللغة الإنجليزية</label>
                                            <input type="text" value="{{ $user->name_en }}" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en">
                                        </div>
                                        @error('name_en')
                                            <span class="text-danger err-msg-name_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="email">البريد الإلكتروني</label>
                                            <input type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                        </div>
                                        @error('email')
                                            <span class="text-danger err-msg-email" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger err-msg-password_confirmation" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-check" style="margin-top: 40px;">
                                            @if($user->active)
                                                <input checked style="width: 30px; height: 30px; cursor: pointer;" type="checkbox" class="form-check-input" id="active" name="active">
                                            @else
                                                <input style="width: 30px; height: 30px; cursor: pointer;" type="checkbox" class="form-check-input" id="active" name="active">
                                            @endif
                                            <label style="position: relative; top: 10px; right: 20px" class="form-check-label" for="active">الفاعلية على النظام</label>
                                        </div>
                                    </div>
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">تعديل</button>
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
