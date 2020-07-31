@include('common.landing-header')
<div class="auth-wrapper">
        <div class="container-fluid ">
            <div class="row flex-row h-100">
                <div class="col-md-12 p-0 d-md-block d-lg-block">
                    <div class="bg2">
                        <div class="overlay"></div>
                        <div class="col-xl-4 col-lg-4 col-md-5 my-auto">
                            <div class="container-login">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="wrap-login">
                                    <form class="login-form" method="POST" action="{{ route('password.email') }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text span-login" id="basic-addon1"><i class="far fa-user"></i></span>
                                                    </div>
                                                    <input id="email" required name="email" class="form-control input-login @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" placeholder="البريد الإلكتروني" autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=" d-flex justify-content-between">
                                                    <div style="text-align: center; margin: 0 auto">
                                                        <button class="login-form-btn">
                                                        إرسال رابط إعادة تعيين كلمة السر
                                                        </button>
                                                    </div>
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
