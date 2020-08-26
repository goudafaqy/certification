@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'dashboard'])
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
                                        <img src="{{ asset('images/prof.png') }}">
                                        طلب إفادة
                                    </a>
                                </div>
                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="{{ asset('images/cancel.png') }}">
                                        طلب حذف دورة
                                    </a>
                                </div>

                                <div class="col-md-4 new-ser">
                                    <a target="" href="">
                                        <img src="{{ asset('images/cancel2.png') }}">
                                        طلب إلغاء تسجيل دورة
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget ">
                    <div class="widget-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="widget-title"> الإعلانات</h3>
                            <img src="{{ asset('images/speaker.png') }}" style="width: 25px; height: 25px">

                        </div>
                    </div>

                    <div class="widget-body">
                       <div class="row">
                            <div class="col-md-12 ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <div class="card">
                                    <div class="news">
                                        <img src="http://127.0.0.1:8000/uploads/advertisments/2.jpg" alt="" class="img-thumbnail">
                                            <div class="details">
                                                <h3>
                                                    <a href="#">منىنمىى</a>
                                                </h3>
                                                <div class="social">
                                                    <p style="text-align: center; margin-top: 10px; color: #fff">
                                                        <i class="far fa-calendar-alt" style="color: #A58661"></i> 08/11/2020
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="carousel-item">
                                <div class="card">
                                            <div class="news">
                                                <img src="http://127.0.0.1:8000/uploads/advertisments/2.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3>
                                                        <a href="#">منىنمىى</a>
                                                    </h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i> 08/11/2020
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="carousel-item">
                                <div class="card">
                                            <div class="news">
                                                <img src="http://127.0.0.1:8000/uploads/advertisments/2.jpg" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3>
                                                        <a href="#">منىنمىى</a>
                                                    </h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i> 08/11/2020
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <ol class="carousel-indicators indect">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                             <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                             <span class="glyphicon glyphicon-chevron-left" style="color:#1b456b;"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" style="color:#1b456b;"></span>
                                <span class="sr-only">Next</span>
                            </a> 
                        </div> 
                                <!-- <div class="owl-container">
                                @foreach($advertisments as $item)
                                    <div class="owl-carousel basic">
                                        <div class="card">
                                            <div class="news">
                                                <img src="{{ url($item->image)}}" alt="" class="img-thumbnail">
                                                <div class="details">
                                                    <h3>
                                                        <a href="#">{{$item->title_ar??'' }}</a>
                                                    </h3>
                                                    <div class="social">
                                                        <p style="text-align: center; margin-top: 10px; color: #fff">
                                                            <i class="far fa-calendar-alt" style="color: #A58661"></i> {{$item->date ??'' }}
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

                                </div>  -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')
