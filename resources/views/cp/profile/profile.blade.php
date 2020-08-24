@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'dashboard'])
<div class="main-content">
    <div class="container-fluid">
        <div class="box box-default">
            <div class="wrapper-box">
                <div class="profile-card active">
                    <div class="card-header">
                    </div>
                    <div class="profile-card-header">
                        <div class="circle">
                            <img class="profile-pic" src="{{asset($user->image)}}">
                            <div class="p-image">
                                <i class="fa fa-camera upload-button"></i>
                            </div>
                        </div>
                    </div>
                    <div class="profile-card-body">
                        <div class="product-tabs">
                            <input checked="checked" id="tab1" type="radio" name="pct">
                            <input id="tab2" type="radio" name="pct">
                            <input id="tab3" type="radio" name="pct">
                            <input id="tab4" type="radio" name="pct">
                            <input id="tab5" type="radio" name="pct">
                            <nav>
                                <ul>
                                    <li class="tab1">
                                        <label for="tab1"> <img src="{{asset('images/man.png')}}" style="width: 22px">
                                            الملف الشخصي</label>
                                    </li>
                                    @if(in_array('instructor', $user->roles->pluck('name')->toArray()))
                                        <li class="tab2">
                                            <label for="tab2"> <img src="{{asset('images/school.png')}}"
                                                                    style="width: 20px"> الكورسات</label>
                                        </li>
                                        <li class="tab3">
                                            <label for="tab3"> <img src="{{asset('images/bo.png')}}"
                                                                    style="width: 22px"> البحوث والدراسات</label>
                                        </li>
                                        <li class="tab4">
                                            <label for="tab4"> <img src="{{asset('images/training.png')}}"
                                                                    style="width: 22px"> الخبرات</label>
                                        </li>
                                        <li class="tab5">
                                            <label for="tab5"> <img src="{{asset('images/certificate.png')}}"
                                                                    style="width: 22px"> الشهادات</label>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                            <section>
                                <div class="tab1 Tab-form">
                                    <div class="container-login">
                                        <div class="wrap-login">
                                            @if (session('updated'))
                                                <div class="alert alert-success">
                                                    {{ session('updated') }}
                                                </div>
                                            @endif
                                            <form class="login-forms" action="{{route('save-profile')}}"
                                                  enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input class="file-upload" name="image" type="file" accept="image/*">
                                                @error('email')
                                                <div class="valid"><a href="#">{{$message}}</a></div>
                                                @enderror
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="far fa-envelope"></i></span>
                                                    </div>
                                                    <input id="email" value="{!! $user->email !!}" required=""
                                                           name="email" class="form-control" type="text"
                                                           placeholder="البريد الإلكتروني">
                                                </div>
                                                @error('name_ar')
                                                <div class="valid"><a href="#">{{$message}}</a></div>
                                                @enderror
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="far fa-user"></i></span>
                                                    </div>
                                                    <input id="name_ar" required="" value="{!! $user->name_ar !!}"
                                                           name="name_ar" class="form-control" type="text"
                                                           placeholder="الاسم رباعى بالعربية">
                                                </div>
                                                @error('name_en')
                                                <div class="valid"><a href="#">{{$message}}</a></div>
                                                @enderror
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="far fa-user"></i></span>
                                                    </div>
                                                    <input id="name_en" required="" value="{!! $user->name_en !!}"
                                                           name="name_en" class="form-control" type="text"
                                                           placeholder="الاسم رباعى بالانجليزية">
                                                </div>
                                                @error('national_id')
                                                <div class="valid"><a href="#">{{$message}}</a></div>
                                                @enderror
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="far fa-id-card"></i></span>
                                                    </div>
                                                    <input id="national_id" value="{!! $user->national_id !!}" readonly
                                                           required="" name="national_id" class="form-control"
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
                                                    <input id="mobile" required="" value="{!! $user->mobile !!}"
                                                           name="mobile" class="form-control" type="text"
                                                           placeholder="الجوال">
                                                </div>
                                                @error('birth_date')
                                                <div class="valid"><a href="#">{{$message}}</a></div>
                                                @enderror
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text icon-date" id="basic-addon1"><i
                                                            class="fas fa-calendar-week"></i></span>
                                                    </div>
                                                    <input placeholder="تاريخ الميلاد" class="form-control" type="text"
                                                           onfocus="(this.type = 'date')" id="birth_date"
                                                           style=" padding-right:50px !important; "
                                                           name="birth_date"
                                                           value="{!! $user->birth_date !!}"
                                                    >
                                                </div>
                                                @error('gender')
                                                <div class="valid"><a href="#">{{$message}}</a></div>
                                                @enderror
                                                <div class=" input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="fas fa-shield-alt"></i></span>
                                                    </div>
                                                    <select id="gender" required="" name="gender"
                                                            class="form-control form-control-lg">
                                                        <option value="" hidden="">الجنس</option>
                                                        <option value="1" {{($user->gender == 1) ? 'selected' : ''}}>
                                                            ذكر
                                                        </option>
                                                        <option value="2" {{($user->gender == 2) ? 'selected' : ''}}>
                                                            أنثى
                                                        </option>
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
                                                        <option value="1" {{($user->education == 1) ? 'selected' : ''}}>
                                                            بكالريوس
                                                        </option>
                                                        <option value="2" {{($user->education == 2) ? 'selected' : ''}}>
                                                            ماجستير
                                                        </option>
                                                        <option value="3" {{($user->education == 3) ? 'selected' : ''}}>
                                                            دكتوراه
                                                        </option>

                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-2 mx-auto">حفظ</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab2 Tab-form">
                                    <form class="form repeater-default row">
                                        <div class="col-lg-10">
                                            <div class="ui-input-container">
                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item>
                                                        <label class="ui-form-input-container">
                                                            <textarea class="ui-form-input"
                                                                      id="word-count-input"></textarea>
                                                            <span class="form-input-label">
                                                                <img src="{{ asset('images/school.png') }}"
                                                                     style="width: 20px"><span data-repeater-delete
                                                                                               type="button"
                                                                                               value="Delete"
                                                                                               class="delet">&times;</span></span>
                                                        </label>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <div class="">
                                                    <button class="btn login-form-btn" data-repeater-create
                                                            type="button"><i class="bx bx-plus"></i>
                                                        أضف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab3 Tab-form">
                                    <form class="form repeater-default row">
                                        <div class="col-lg-10">
                                            <div class="ui-input-container">
                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item>
                                                        <label class="ui-form-input-container">
                                                            <textarea class="ui-form-input"
                                                                      id="word-count-input"></textarea>
                                                            <span class="form-input-label"><img
                                                                    src="{{ asset('images/bo.png') }}"
                                                                    style="width: 22px"><span data-repeater-delete
                                                                                              type="button"
                                                                                              value="Delete"
                                                                                              class="delet">&times;</span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <div class="">
                                                    <button class="btn login-form-btn" data-repeater-create
                                                            type="button"><i class="bx bx-plus"></i>
                                                        أضف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab4 Tab-form">
                                    <form class="form repeater-default row">
                                        <div class="col-lg-10">
                                            <div class="ui-input-container">
                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item>
                                                        <label class="ui-form-input-container">
                                                            <textarea class="ui-form-input"
                                                                      id="word-count-input"></textarea>
                                                            <span class="form-input-label"><img
                                                                    src="{{ asset('images/training.png') }}"
                                                                    style="width: 22px"><span data-repeater-delete
                                                                                              type="button"
                                                                                              value="Delete"
                                                                                              class="delet">&times;</span></span>
                                                        </label>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <div class="">
                                                    <button class="btn login-form-btn" data-repeater-create
                                                            type="button"><i class="bx bx-plus"></i>
                                                        أضف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab5 Tab-form">
                                    <form class="form repeater-default row">
                                        <div class="col-lg-10">
                                            <div class="ui-input-container">
                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item>
                                                        <label class="ui-form-input-container">
                                                            <textarea class="ui-form-input"
                                                                      id="word-count-input"></textarea>
                                                            <span class="form-input-label"><img
                                                                    src="{{ asset('images/certificate.png') }}"
                                                                    style="width: 22px"><span data-repeater-delete
                                                                                              type="button"
                                                                                              value="Delete"
                                                                                              class="delet">&times;</span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <div class="">
                                                    <button class="btn login-form-btn" data-repeater-create
                                                            type="button"><i class="bx bx-plus"></i>
                                                        أضف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')