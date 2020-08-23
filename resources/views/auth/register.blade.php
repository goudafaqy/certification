@include('cp.common.register-header')
<div class="col-xl-8 col-lg-8 col-md-9 my-auto">
    <div class="container-login">
        <div class="wrap-login">

            <form class="login-form" method="post" action="{{ route('register') }}">
                @csrf
                <div class="logo-centered">
                    <a href="{{ url('/') }}">
                        <img src="images/new-logo.png" class="" alt="">
                    </a>
                </div>
                <span class="login-form-title ">
                                        </span>
                <div class="row">
                    <div class="col-md-6" style="border-left: 1px solid">
                        @error('email')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="far fa-envelope"></i></span>
                            </div>
                            <input id="email" required="" name="email" class="form-control"
                                   type="text" placeholder="البريد الإلكتروني">
                        </div>

                        @error('name_ar')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="far fa-user"></i></span>
                            </div>
                            <input id="name_ar" required="" name="name_ar" class="form-control"
                                   type="text" placeholder="الاسم رباعى بالعربية">
                        </div>

                        @error('name_en')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="far fa-user"></i></span>
                            </div>
                            <input id="name_en" required="" name="name_en" class="form-control"
                                   type="text" placeholder="الاسم رباعى بالانجليزية">
                        </div>

                        @error('password')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input class="form-control" type="password" id="password" required=""
                                   name="password" placeholder="كلمة المرور">
                        </div>
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input id="password-confirm" placeholder="تاكيد كلمة المرور"
                                   type="password" class="form-control"
                                   name="password_confirmation" required
                                   autocomplete="new-password">
                        </div>


                    </div>

                    <div class="col-md-6 jtc">
                        @error('national_id')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="far fa-id-card"></i></span>
                            </div>
                            <input id="national_id" required="" name="national_id"
                                   class="form-control"
                                   type="text" placeholder="رقم الهوية">
                        </div>

                        @error('mobile')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-mobile-alt"></i></span>
                            </div>
                            <input id="mobile" required="" name="mobile" class="form-control"
                                   type="text" placeholder="الجوال">
                        </div>

                        @error('birth_date')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text icon-date" id="basic-addon1"><i
                                                            class="fas fa-calendar-week"></i></span>
                            </div>
                            <input placeholder="تاريخ الميلاد" class="form-control" type="text"
                                   onfocus="(this.type = 'date')" id="birth_date"
                                   style=" padding-right:50px !important; " name="birth_date">
                        </div>

                        @error('gender')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-user-friends"></i></span>
                            </div>
                            <select id="gender" required="" name="gender"
                                    class="form-control form-control-lg">
                                <option value="" hidden="">الجنس</option>
                                <option value="1">ذكر</option>
                                <option value="2">أنثى</option>
                            </select>
                        </div>

                        @error('education')
                        <div class="valid"><a href="#">{{$message}}</a></div>
                        @enderror
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-shield-alt"></i></span>
                            </div>

                            <select name="education" id="education"
                                    class="form-control form-control-lg">
                                <option value="" hidden="">المؤهل العلمي</option>
                                <option value="1">بكالريوس</option>
                                <option value="2">ماجستير</option>
                                <option value="3">دكتوراه</option>

                            </select>
                        </div>
                        <!-- <div class=" d-flex justify-content-between">
                         <img src="images/student-avatar.png">


                          </div>
                            -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">


                        <div style="text-align: center">
                            <button class="login-form-btn" type="submit">
                                إنشاء حساب
                            </button>

                        </div>
                        <!-- <div style="text-align: center">
                            <button class="login-form-btn">
                                تسجيل الدخول
                            </button>
                        </div> -->


                    </div>

                    <div class="col-md-5">
                        <div class=" login-so d-flex justify-content-between align-items-center">

                            <!--<div style="">
                               <p class="">
                                    سجل الدخول بإستخدام
                               </p>
                           </div>

                            <div>
                               <a href="#" class="">
                               <i class="fab fa-google"></i>
                               </a>
                                <a href="#" class="">
                                 <i class="fab fa-linkedin-in"></i>
                               </a>
                           </div>
                              -->
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@include('cp.common.register-footer')
