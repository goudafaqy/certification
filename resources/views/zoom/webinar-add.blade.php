@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'create-webinar'])
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
                            <form id="add-user-form" action="{{ route('store-webinar') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="topic">عنوان المناقشة</label>
                                            <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic">
                                        </div>
                                        @error('topic')
                                            <span class="text-danger err-msg-topic" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="start_time">موعد البدء</label>
                                            <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time">
                                        </div>
                                        @error('start_time')
                                            <span class="text-danger err-msg-start_time" role="alert">
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

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="duration">المدة الزمنية بالدقائق</label>
                                            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration">
                                        </div>
                                        @error('duration')
                                            <span class="text-danger err-msg-name_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="agenda">نظرة عامة عن المناقشة</label>
                                            <textarea class="form-control @error('agenda') is-invalid @enderror" id="agenda" name="agenda" rows="3">{{ old('agenda') }}</textarea>
                                        </div>
                                        @error('agenda')
                                        <span class="text-danger err-msg-agenda" role="alert">
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
