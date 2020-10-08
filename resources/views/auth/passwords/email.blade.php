@include('cp.common.register-header')
<div class=" col-md-12 p-0 d-md-block d-lg-block">
    <div class="bg2" style="background-image: url('{{asset('images/slider/1.jpg')}}')">
        <div class="overlay"></div>

        <div class="col-xl-8 col-lg-8 col-md-9 my-auto">
            <div class="container-login">
                <div class="wrap-login">
                @if (session('info'))
                                        <div class="alert alert-info alert-dismissible fade show">
                                            {{ session('info') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                    <form class="login-form" action="{{ route('reset-password') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}" >
                        <div class="logo-centered">
                            <a href="index.html">
                                <img src="{{asset('images/new-logo.png')}}" class="" alt="">
                            </a>
                        </div>
                        <span class="login-form-title ">
					</span>
                        <div class="row">
                            <div class="col-md-7" style="border-left: 1px solid">
                               
                                @error('new_password')
                                <div class="valid"><a href="#">{{$message}}</a></div>
                                @enderror
                                <div class=" input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input class="form-control" type="password" id="new_password" required="" name="new_password" placeholder="كلمة المرور الجديدة">
                                </div>
                                <div class=" input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input class="form-control" type="password" id="new_password_confirmation" required="" name="new_password_confirmation" placeholder="أعد تأكيد كلمة المرور الجديدة">
                                </div>

                                <div style="text-align: center">
                                    <button class="login-form-btn">
                                        تغيير كلمة المرور
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-5 jtc">

                                <div class=" d-flex justify-content-between">
                                    <img src="{{asset('images/student-avatar.png')}}">
                                </div>

                            </div>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.register-footer')
