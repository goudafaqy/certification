@extends('site.layouts.master')

@section('content')
    <div class="top_site_main" style="color: #ffffff;background-image:url({{asset('site-assets/images/profile.jpg')}});">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container">
                <h2> الملف الشخصي <span style="float:left"> {{$mr->name}}</span></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="breadcrumb-container breadcrumb-container2" aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الملف الشخصي للمدرب</li>

                </ol>
            </div>
        </nav>
    </div>
    <div class="profile-content instructor-profile m-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" data-state="#about">
                        <div class="card-header">
                            <div class="card-cover"></div>
                            <img class="card-avatar" src="{{$mr->image != null ? url($mr->image ):asset('images/Dr_Image.jpg')}}" alt="avatar" />
                            <h1 class="card-fullname">{{$mr->name}}</h1>
                            <h2 class="card-jobtitle">{{$mr->job_title}}</h2>
                        </div>
                        <div class="card-main">
                            <div class="card-section is-active" id="about">
                                <div class="card-content">


                                    <p class="card-desc">
                                        <a><i class="fa fa-phone"></i> {{$mr->mobile}}</a>

                                    </p>
                                    <p class="card-desc">

                                        <a><span><i class="fa fa-envelope-open"></i> {{$mr->email}}</span></a>
                                    </p>
                                </div>
                                <div class="card-social">
                                    <a href="{{$mr->twitter_link}}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" /></svg></a>


                                    <a href="{{$mr->facebook_link}}" target="_blank"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.994 24v-.001H24v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07V7.976H8.489v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243V24zM.396 7.977h4.976V24H.396zM2.882 0C1.291 0 0 1.291 0 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909A2.884 2.884 0 002.882 0z" /></svg></a>
                                </div>
                            </div>


                            <!-- <div class="card-buttons">
                              <button data-section="#about" class="is-active">  بيانات شخصية</button>
                              <button data-section="#experience">  دورات تدريبية </button>

                            </div> -->
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="product-tabs">
                        <input checked="checked" id="tab1" type="radio" name="pct">
                        <input id="tab2" type="radio" name="pct">
                        <input id="tab3" type="radio" name="pct">
                        <input id="tab4" type="radio" name="pct">
                        <input id="tab5" type="radio" name="pct">
                        <nav>
                            <ul>
                                <li class="tab1">
                                    <label for="tab1"> <img src="{{asset('site-assets/images/certificate.png')}}" style="width: 22px"> الشهادات العلمية </label>
                                </li>
                                <li class="tab2">
                                    <label for="tab2"> <img src="{{asset('site-assets/images/training.png')}}" style="width: 22px"> الخبرات العملية</label>
                                </li>
                                <li class="tab3">
                                    <label for="tab3"> <img src="{{asset('site-assets/images/bo.png')}}" style="width: 22px"> البحوث والدراسات</label>
                                </li>
                                <li class="tab4">
                                    <label for="tab4"> <img src="{{asset('site-assets/images/bo.png')}}" style="width: 22px"> الدورات الحاصل عليها</label>
                                </li>
                            </ul>
                        </nav>
                        <section>
                            <div class="tab1 Tab-form">
                                <div class="instructor-items">
                                    <ul>
                                        @foreach($mr->certificates as $cert)
                                        <li>

                                            <p>
                                                {{$cert->body}}
                                            </p>


                                        </li>
                                            @endforeach

                                    </ul>

                                </div>

                            </div>
                            <div class="tab2 Tab-form">
                                <div class="instructor-itemss">
                                    <ul>
                                        @foreach($mr->experiences as $exp)
                                        <li>
                                            <div class="single-item">
                                                <p>
                                                    <i class="fa fa-list-ul"></i> {{$exp->body}}.

                                                </p>
                                            </div>

                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <div class="tab3 Tab-form">
                                <div class="instructor-itemss">
                                    <ul>
                                        @foreach($mr->researches as $rec)
                                        <li>
                                            <div class="single-item">
                                                <p>
                                                    <i class="fas fa-book-open"></i> {{$rec->body}}


                                                </p>
                                            </div>

                                        </li>
                                            @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="tab4 Tab-form">
                                <div class="instructor-itemss">
                                    <ul>
                                        @foreach($mr->courses_have_taken as $cour)
                                            <li>
                                                <div class="single-item">
                                                    <p>
                                                        <i class="fas fa-book-open"></i> {{$cour->body}}


                                                    </p>
                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                        </section>
                    </div>


                </div>

                <div class="card-section new-courses">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="card-content">
                            <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="card-subtitle" style="text-align: center;">الدورات التدريبية من قبل المدرب</div>
                            </div>
                            <div class="row">
                                @foreach($mr->courses as $course)
                                <div class="col-lg-3">

                                    <div class="profile-card">
                                        <div class="card-header">
                                            <img class="profile-image" src="{{asset('site-assets/images/laww.png')}}" alt="profile image">

                                            <div class="profile-role">{{$course->title}}</div>

                                            <div class="divider">
                                                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="contacts">
                                                <div class="flex">
                                                    <output dir="rtl" tabindex="0" role="slider" aria-readonly="true" aria-live="off" aria-valuemin="1" aria-valuemax="5" aria-valuenow="3" class="b-rating form-control align-items-center b-rating-inline form-control-sm d-inline-flex border-0 readonly" id="__BVID__107"><span class="b-rating-star   b-rating-star-full"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star-fill b-icon bi text-rating"><g><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-full"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star-fill b-icon bi text-rating"><g><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-full"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star-fill b-icon bi text-rating"><g><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-empty"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star b-icon bi text-rating"><g><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 00-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 00-.163-.505L1.71 6.745l4.052-.576a.525.525 0 00.393-.288l1.847-3.658 1.846 3.658a.525.525 0 00.393.288l4.052.575-2.906 2.77a.564.564 0 00-.163.506l.694 3.957-3.686-1.894a.503.503 0 00-.461 0z" clip-rule="evenodd"></path></g></svg></span></span><span class="b-rating-star   b-rating-star-empty"><span class="b-rating-icon"><svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" alt="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-star b-icon bi text-rating"><g><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 00-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 00-.163-.505L1.71 6.745l4.052-.576a.525.525 0 00.393-.288l1.847-3.658 1.846 3.658a.525.525 0 00.393.288l4.052.575-2.906 2.77a.564.564 0 00-.163.506l.694 3.957-3.686-1.894a.503.503 0 00-.461 0z" clip-rule="evenodd"></path></g></svg></span></span><b aria-hidden="true" class="b-rating-value  ">3/5</b></output>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $("#learn-press-course-tabs ul li a").click(function() {
        $("#learn-press-course-tabs ul li").removeClass("active");
        $(this).parent().addClass('active');
    });
</script>
    <script>
    // Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function(e) {
        e.stopPropagation();
    });
    // make it as accordion for smaller screens
    if ($(window).width() < 992) {
        $('.dropdown-menu a').click(function(e) {
            e.preventDefault();
            if ($(this).next('.submenu').length) {
                $(this).next('.submenu').toggle();
            }
            $('.dropdown').on('hide.bs.dropdown', function() {
                $(this).find('.submenu').hide();
            })
        });
    }
</script>
    @endsection
