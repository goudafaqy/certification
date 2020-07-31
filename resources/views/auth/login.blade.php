@include('common.landing-header')
    <div class="auth-wrapper">
        <div class="container-fluid ">
            <div class="row flex-row h-100">
                <div class="col-md-12 p-0 d-md-block d-lg-block">
                    <div class="bg2">
                        <div class="overlay"></div>
                        <div class="col-xl-4 col-lg-4 col-md-5 my-auto">
                            <div class="container-login">
                                <div class="wrap-login">
                                    <form class="login-form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text span-login" id="basic-addon1"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input id="email" required name="email" class="form-control input-login @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" placeholder="البريد الإلكتروني" autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback text-right" role="alert" style="font-size: 1em; margin-top: 10px;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text span-login" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                                    </div>
                                                    <input class="form-control input-login @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="current-password" placeholder="كلمة المرور">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert" style="font-size: 1em; margin-top: 10px;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class=" d-flex justify-content-between">
                                                    <div class="">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <span class="custom-control-label">&nbsp;تذكرني</span>
                                                        </label>
                                                    </div>
                                                    @if (Route::has('password.request'))
                                                    <div class="">
                                                        <a href="{{ route('password.request') }}" class="forget">نسيت كلمة المرور ؟ </a>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" d-flex justify-content-between">

                                                    <div style="text-align: center">
                                                        <button class="login-form-btn">
                                                            تسجيل الدخول
                                                        </button>
                                                    </div>
                                                    <!-- <div style="text-align: center">
                                                        <button class="login-form-btn">
                                                            إنشاء حساب
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('common.landing-footer')