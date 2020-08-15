@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'dashboards.instructor'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title"> الخدمات الإلكترونية</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="images/prof.png">
                                        طلب إفادة
                                    </a>
                                </div>
                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="images/cancel.png">
                                        طلب حذف دورة
                                    </a>
                                </div>
                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="images/cancel2.png">
                                        طلب إلغاء تسجيل دورة
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الدورات الأخيرة</h3>
                                <a href="#" class="btn btn-all"> المزيد</a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row odd">
                                <div class="col-xl-6 col-md-6">
                                    <div class="proj-progress-card d-flex align-items-center">
                                        <img src="images/albom1.jpg">
                                        <div>
                                            <h6>أساسيات وسائل التواصل الاجتماعي</h6>
                                            <div class="row align-items-center justify-content-around">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" style="width:100%"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-0 text-success font-weight-bold">100%</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="proj-progress-card d-flex align-items-center">
                                        <img src="images/albom2.jpg">
                                        <div>
                                            <h6> اساسيات التعلم عن بعد </h6>
                                            <div class="row align-items-center justify-content-around">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-blue" style="width:75%"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-0 text-info font-weight-bold">75%</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row odd">
                                <div class="col-xl-6 col-md-6">
                                    <div class="proj-progress-card d-flex align-items-center">
                                        <img src="images/albom7.jpg">
                                        <div>
                                            <h6> اساسيات التعلم عن بعد </h6>
                                            <div class="row align-items-center justify-content-around">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-yellow" style="width:50%"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-0 text-warning font-weight-bold">50%</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="proj-progress-card d-flex align-items-center">
                                        <img src="images/law3.jpg">
                                        <div>
                                            <h6> اساسيات التعلم عن بعد </h6>
                                            <div class="row align-items-center justify-content-around">
                                                <div class="col">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-red" style="width:25%"></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-0 text-danger font-weight-bold">25%</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الدورات التدريبة المفضلة </h3>
                                <a href="#" class="btn btn-all"> المزيد</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class=" course-box">
                                        <img src="images/img1.jpg" alt="" class="img-thumbnail">
                                        <div class="details">
                                            <h3><a href="#"> اساسيات التعلم عن بعد</a></h3>
                                            <div class="d-flex justify-content-between price">
                                                <p class="">متبقي 2 يوم </p>
                                                <h6>14$</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class=" course-box">
                                        <img src="images/img2.jpg" alt="" class="img-thumbnail">
                                        <div class="details">
                                            <h3><a href="#"> اساسيات التعلم عن بعد</a></h3>
                                            <div class="d-flex justify-content-between price">
                                                <p class="">متبقي 2 يوم </p>
                                                <h6>14$</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class=" course-box">
                                        <img src="images/img3.jpg" alt="" class="img-thumbnail">
                                        <div class="details">
                                            <h3><a href="#"> اساسيات التعلم عن بعد</a></h3>
                                            <div class="d-flex justify-content-between price">
                                                <p class="">متبقي 2 يوم </p>
                                                <h6>14$</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class=" course-box">
                                        <img src="images/law2.jpg" alt="" class="img-thumbnail">
                                        <div class="details">
                                            <h3><a href="#"> اساسيات التعلم عن بعد</a></h3>
                                            <div class="d-flex justify-content-between price">
                                                <p class="">متبقي 2 يوم </p>
                                                <h6>14$</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الإختبارات</h3>
                                <a href="#" class="btn btn-all"> المزيد</a>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush mb-0">
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="media-left text-light-gray ml-2">
                                        <img src="images/exam2.png" style="width: 30px; height: 30px">
                                    </div>
                                    <div class="media-body">
                                        <a class="text-body mb-1" href="fixed-#"><strong>الدورة الاولى</strong></a><br>
                                        <div class="d-flex align-items-center">
                                             <span class="text-blue ml-1">
                                             <img src="images/v.png" style="width: 18px; height: 18px">
                                             </span>
                                            <a href="fixed-take-course.html" class="small">اساسيات</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center d-flex align-items-center">
                                        <h4 class="mb-0 text-warning">5.8</h4>
                                        <span class="badge badge-warning mr-2">
                                          جيد
                                          </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="media-left text-light-gray ml-2">
                                        <img src="images/exam2.png" style="width: 30px; height: 30px">
                                    </div>
                                    <div class="media-body">
                                        <a class="text-body mb-1" href="fixed-#"><strong>الدورة الثانية</strong></a><br>
                                        <div class="d-flex align-items-center">
                                             <span class="text-blue ml-1">
                                             <img src="images/v.png" style="width: 18px; height: 18px">
                                             </span>
                                            <a href="fixed-take-course.html" class="small">اساسيات</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center d-flex align-items-center">
                                        <h4 class="mb-0 text-success">9.8</h4>
                                        <span class="badge badge-success mr-2">
                                          ممتاز
                                          </span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="media-left text-light-gray ml-2">
                                        <img src="images/exam2.png" style="width: 30px; height: 30px">
                                    </div>
                                    <div class="media-body">
                                        <a class="text-body mb-1" href="fixed-#"><strong>الدورة الثالثة</strong></a><br>
                                        <div class="d-flex align-items-center">
                                             <span class="text-blue ml-1">
                                             <img src="images/v.png" style="width: 18px; height: 18px">
                                             </span>
                                            <a href="fixed-take-course.html" class="small">اساسيات</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center d-flex align-items-center">
                                        <h4 class="mb-0 text-danger">2.8</h4>
                                        <span class="badge badge-danger mr-2">
                                          راسب
                                          </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">الواجبات</h3>
                                <a href="#" class="btn btn-all"> المزيد</a>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush mb-0">
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="media-left text-light-gray ml-2">
                                        <img src="images/exam2.png" style="width: 30px; height: 30px">
                                    </div>
                                    <div class="media-body">
                                        <a class="text-body mb-1" href="fixed-#"><strong>أساسيات التعلم</strong></a><br>
                                        <div class="d-flex align-items-center">
                                             <span class="text-blue ml-1">
                                             <img src="images/cal.png" style="width: 18px; height: 18px">
                                             </span>
                                            <a href="fixed-take-course.html" class="small">60 دقيقية</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center d-flex align-items-center">
                                        <a href="#" class="btn btn-all" style="width: 60px"> إبدأ</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget ">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> الإعلانات</h3>
                            <img src="images/speaker.png" style="width: 25px; height: 25px">
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="owl-container">
                                    <div class="owl-carousel basic">
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/albom1.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">مركز التدريب العدلي مركز التدريب العدلي</a></h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i>
                                                            09.10.2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/albom2.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">مركز التدريب العدلي مركز التدريب العدلي</a></h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i>
                                                            09.10.2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-nav text-center">
                                        <a href="#" class="left-arrow owl-prev">
                                            <i class="ik ik-chevron-right"></i>
                                        </a>
                                        <div class="slider-dot-container"></div>
                                        <a href="#" class="right-arrow owl-next">
                                            <i class="ik ik-chevron-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget ">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> الشهادات التدريبة</h3>
                            <img src="images/certificate.png" style="width: 25px; height: 25px">
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="owl-container">
                                    <div class="owl-carousel certi">
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/cup.png" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">تهانينا نتيجة الدورة التدريبية </a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="news">
                                                <img src="images/cup.png" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3><a href="#">تهانينا نتيجة الدورة التدريبية </a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-nav text-center">
                                        <a href="#" class="left-arrow owl-prev">
                                            <i class="ik ik-chevron-right"></i>
                                        </a>
                                        <div class="slider-dot-container"></div>
                                        <a href="#" class="right-arrow owl-next">
                                            <i class="ik ik-chevron-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget ">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> التقويم التدريبي </h3>
                            <img src="images/cal.png" style="width: 25px; height: 25px">
                        </div>
                    </div>
                    <div class="card cal">
                        <div id="container" class="calendar-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.dashboard-footer')
