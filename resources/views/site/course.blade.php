@extends('site.layouts.master')
@section('content')
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="/courses">الدورات التدريبية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المنازعات التجاريه</li>
            </ol>
        </div>
    </nav>


    <div class="course-info-top">
        <div class="container">

            <div class="row">
                <div class="course-info-left col-sm-8">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h1 class="entry-title">
                            {{$course->title}}
                        </h1>
                        <p> {{substr($course->overview,0,100)}} ...
                        </p>
                    </div>
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="course-meta">
                            <div class="course-author">
                                <div class="course-author-content">
                                    <img alt="User Avatar" src="{{asset('site-assets/images/Dr_Image.jpg')}}" class="avatar avatar-96 photo" height="96"
                                         width="96">
                                    <div class="author-contain">
                                        <label itemprop="jobTitle">الأستاذ</label>
                                        <div class="value">
                                            <a href="#">
                                                {{$course->instructor->name}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-categories">
                                <label>التصنيف
                                </label>
                                <div class="value">
                            <span class="cat-links">
                                <a href="#">  {{$course->category->title}}</a>
                            </span>
                                </div>
                            </div>
                            <div class="course-review">
                                <label>التقيم</label>
                                <div class="value">
                                    <div class="review-stars-rated">
                                        <ul class="review-stars">

                                            <li><span class="far fa-star"></span></li>
                                            <li><span class="far fa-star"></span></li>
                                            <li><span class="far fa-star"></span></li>
                                            <li><span class="far fa-star"></span></li>
                                            <li><span class="far fa-star"></span></li>
                                        </ul>
                                    </div>
{{--                                    <span>(تقيم)</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="course-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="course-summary">
                            <div id="learn-press-course-tabs" class="course-tabs">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="course-nav-tab-overview active thim-col-4">
                                        <a href="#tab-overview" data-toggle="tab">
                                            <img src="{{asset('site-assets/images/agenda (1).png')}}" class="img-fluid" width="20">
                                            <span>نظرة عامة</span>
                                        </a>
                                    </li>
{{--                                    <li role="presentation" class="course-nav-tab-curriculum thim-col-4">--}}
{{--                                        <a href="#tab-curriculum" data-toggle="tab">--}}
{{--                                            <img src="{{asset('site-assets/images/product-description.png')}}" class="img-fluid" width="20">--}}
{{--                                            <span>المخطط</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li role="presentation" class="course-nav-tab-instructor thim-col-4">
                                        <a href="#tab-instructor" data-toggle="tab">
                                            <img src="{{asset('site-assets/images/teacher.png')}}" class="img-fluid" width="20">
                                            <span>المدرب</span>
                                        </a>
                                    </li>
{{--                                    <li role="presentation" class="course-nav-tab-reviews thim-col-4">--}}
{{--                                        <a href="#tab-reviews" data-toggle="tab">--}}
{{--                                            <img src="{{asset('site-assets/images/laww.png')}}" class="img-fluid" width="20">--}}
{{--                                            <span>المراجعات</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane course-tab-panel-overview course-tab-panel active" id="tab-overview">
                                        <div class="course-description" id="learn-press-course-description">


                                            <div class="thim-course-content">
                                                {{$course->overview}}

                                            </div>


                                        </div>
                                    </div>
{{--                                    <div class="tab-pane course-tab-panel-curriculum course-tab-panel" id="tab-curriculum">--}}
{{--                                        <div class="course-curriculum" id="learn-press-course-curriculum">--}}
{{--                                            <div class="section-header wow fadeInDown" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInDown;">--}}
{{--                                                <h4> المنازعات<span> التجارية</span></h4>--}}

{{--                                            </div>--}}
{{--                                            <div class="curriculum-scrollable">--}}
{{--                                                <ul class="curriculum-sections">--}}
{{--                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">--}}

{{--                                                        <div class="panel panel-default">--}}
{{--                                                            <div class="panel-heading" role="tab" id="section-1">--}}
{{--                                                                <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#section-1_contents" aria-expanded="false" aria-controls="section-1_contents" class="collapsed">--}}
{{--                                                                    <a>--}}
{{--                                                                        <i class="fa fa-chevron-down"></i>الوحدة الأولى: مقدمة في المنازعات التجارية وتعريفها وأهم ما يميز النظام التجاري عن غيره--}}
{{--                                                                    </a>--}}
{{--                                                                </h4>--}}
{{--                                                            </div>--}}
{{--                                                            <div id="section-1_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="section-1" style="">--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-1">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-1_contents" aria-expanded="false" aria-controls="subsection-1_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الأول : مقدمة في المنازعات التجارية وتعريفها--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-1_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="subsection-1" style="">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>تعريف المنازعات التجارية</li>--}}
{{--                                                                                <li>النشاط (1ـ1ـ1)</li>--}}
{{--                                                                                <li>وحدة</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-2">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-2_contents" aria-expanded="false" aria-controls="subsection-2_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الثاني : أهم ما يميز النظام التجاري عن غيره--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-2_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-2">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>ما يميز النظام التجاري</li>--}}
{{--                                                                                <li>ما يميز القضاء التجاري</li>--}}
{{--                                                                                <li>النشاط (1ـ1ـ2)</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="panel panel-default">--}}
{{--                                                            <div class="panel-heading" role="tab" id="section-2">--}}
{{--                                                                <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#section-2_contents" aria-expanded="false" aria-controls="section-2_contents" class="collapsed">--}}
{{--                                                                    <a>--}}
{{--                                                                        <i class="fa fa-chevron-down"></i>الوحدة الثانية: النزاعات التجارية--}}
{{--                                                                    </a>--}}
{{--                                                                </h4>--}}
{{--                                                            </div>--}}
{{--                                                            <div id="section-2_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="section-2">--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-1">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-1_contents" aria-expanded="false" aria-controls="subsection-1_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الثالث النزاعات الداخلة تحت اختصاص المحكمة التجارية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-1_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="subsection-1" style="">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>اختصاص المحكمة التجارية</li>--}}
{{--                                                                                <li>النشاط (1ـ2ـ1)</li>--}}
{{--                                                                                <li>شروط الدعوى المنظورة أمام المحكمة التجارية</li>--}}
{{--                                                                                <li>النشاط (1ـ2ـ2)</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-2">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-2_contents" aria-expanded="false" aria-controls="subsection-2_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الرابع تعريف التاجر وما هي الأعمال التجارية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-2_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-2">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>تعريف التاجر</li>--}}
{{--                                                                                <li>بيان الأعمال التجارية</li>--}}
{{--                                                                                <li>النشاط (1ـ2ـ2)</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-3">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-3_contents" aria-expanded="false" aria-controls="subsection-3_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الخامس النزاعات الداخلة تحت اختصاص لجنة المنازعات المصرفية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-3_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-3">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>تأسيس اللجنة</li>--}}
{{--                                                                                <li>اختصاص اللجنة</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-4">--}}
{{--                                                                        <h5 class="panel-title"  data-toggle="collapse" data-parent="#accordion" href="#subsection-4_contents" aria-expanded="false" aria-controls="subsection-4_contents" class="collapsed">--}}
{{--                                                                            <a role="button">--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع السادس النزاعات الداخلة تحت اختصاص لجنة الفصل في المخالفات والمنازعات التمويلية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-4_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-4">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>تأسيس اللجنة</li>--}}
{{--                                                                                <li>اختصاص اللجنة</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-5">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-5_contents" aria-expanded="false" aria-controls="subsection-5_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع السابع النزاعات الداخلة تحت اختصاص لجنة الفصل في المنازعات والمخالفات التأمينية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-5_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-5">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>تأسيس اللجنة</li>--}}
{{--                                                                                <li>اختصاص اللجنة</li>--}}
{{--                                                                                <li>النشاط (1ـ2ـ3)</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-6">--}}
{{--                                                                        <h5 class="panel-title"  role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-6_contents" aria-expanded="false" aria-controls="subsection-6_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الثامن النزاعات الداخلة تحت اختصاص لجنة الفصل في منازعات الأوراق المالية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-6_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-6">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>تأسيس اللجنة</li>--}}
{{--                                                                                <li>اختصاص اللجنة</li>--}}
{{--                                                                                <li>النشاط (2ـ1ـ1)</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-7">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-7_contents" aria-expanded="false" aria-controls="subsection-7_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع التاسع النزاعات التجارية الداخلة تحت اختصاص المحاكم العامة--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-7_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-7">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>النزاعات التجارية الداخلة تحت اختصاص المحاكم العامة</li>--}}
{{--                                                                                <li>النشاط (2ـ1ـ2)</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="panel panel-default">--}}
{{--                                                            <div class="panel-heading" role="tab" id="section-3">--}}
{{--                                                                <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#section-3_contents" aria-expanded="false" aria-controls="section-3_contents" class="collapsed">--}}
{{--                                                                    <a >--}}
{{--                                                                        <i class="fa fa-chevron-down"></i>الوحدة الثالثة: وسائل الإثبات الخاصة بالنزاعات التجارية--}}
{{--                                                                    </a>--}}
{{--                                                                </h4>--}}
{{--                                                            </div>--}}
{{--                                                            <div id="section-3_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="section-3">--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-1">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-1_contents" aria-expanded="false" aria-controls="subsection-1_contents" class="collapsed">--}}
{{--                                                                            <a >--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع العاشر : أوراق التجار--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-1_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="subsection-1" style="">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-2">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-2_contents" aria-expanded="false" aria-controls="subsection-2_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الحادي عشر: العرف التجاري--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-2_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-2">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-3">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-3_contents" aria-expanded="false" aria-controls="subsection-3_contents" class="collapsed">--}}
{{--                                                                            <a >--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الثاني عشر: القرائن--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-3_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-3">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-4">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-4_contents" aria-expanded="false" aria-controls="subsection-4_contents" class="collapsed">--}}
{{--                                                                            <a >--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الثالث عشر: الدفاتر التجارية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-4_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-4">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-5">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-5_contents" aria-expanded="false" aria-controls="subsection-5_contents" class="collapsed">--}}
{{--                                                                            <a >--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الرابع عشر: الخبرة--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-5_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-5">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-6">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-6_contents" aria-expanded="false" aria-controls="subsection-6_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الخامس عشر: القيد المحاسبي--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-6_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-6">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-7">--}}
{{--                                                                        <h5 class="panel-title"  role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-7_contents" aria-expanded="false" aria-controls="subsection-7_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع السادس عشر: ميزانيات الشركات--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-7_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-7">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-8">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-8_contents" aria-expanded="false" aria-controls="subsection-8_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع السابع عشر: سندات الشحن--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-8_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-8">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-9">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-9_contents" aria-expanded="false" aria-controls="subsection-9_contents" class="collapsed">--}}
{{--                                                                            <a >--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع الثامن عشر : الإثبات بالمحررات الالكترونية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-9_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-9">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="panel panel-default">--}}
{{--                                                            <div class="panel-heading" role="tab" id="section-4">--}}
{{--                                                                <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#section-4_contents" aria-expanded="false" aria-controls="section-4_contents" class="collapsed">--}}
{{--                                                                    <a >--}}
{{--                                                                        <i class="fa fa-chevron-down"></i>الوحدة الرابعة: وسائل فض المنازعات التجارية--}}
{{--                                                                    </a>--}}
{{--                                                                </h4>--}}
{{--                                                            </div>--}}
{{--                                                            <div id="section-4_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="section-4">--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-1">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-1_contents" aria-expanded="false" aria-controls="subsection-1_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع التاسع عشر:  الطريقة التقليدية--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-1_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="subsection-1" style="">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-2">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-2_contents" aria-expanded="false" aria-controls="subsection-2_contents" class="collapsed">--}}
{{--                                                                            <a>--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الموضوع العشرون : الوسائل الحديثة--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-2_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subsection-2">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>فض النزاع التجاري عن طريق التحكيم</li>--}}
{{--                                                                                <li>فض النزاع التجاري عن طريق المفاوضات المباشرة</li>--}}
{{--                                                                                <li>فض النزاع التجاري عن طريق الوساطة والصلح</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="panel panel-default">--}}
{{--                                                            <div class="panel-heading" role="tab" id="section-5">--}}
{{--                                                                <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#section-5_contents" aria-expanded="false" aria-controls="section-5_contents" class="collapsed">--}}
{{--                                                                    <a >--}}
{{--                                                                        <i class="fa fa-chevron-down"></i>الاختبارات--}}
{{--                                                                    </a>--}}
{{--                                                                </h4>--}}
{{--                                                            </div>--}}
{{--                                                            <div id="section-5_contents" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="section-5">--}}

{{--                                                                <div class="panel-body">--}}
{{--                                                                    <div class="panel-heading" role="tab" id="subsection-1">--}}
{{--                                                                        <h5 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#subsection-1_contents" aria-expanded="false" aria-controls="subsection-1_contents" class="collapsed">--}}
{{--                                                                            <a >--}}
{{--                                                                                <i class="fa fa-chevron-down"></i>الاختبارات--}}
{{--                                                                            </a>--}}
{{--                                                                        </h5>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="subsection-1_contents" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="subsection-1" style="">--}}
{{--                                                                        <div class="panel-body">--}}
{{--                                                                            <ul>--}}
{{--                                                                                <li>الاختبارات</li>--}}
{{--                                                                            </ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="tab-pane course-tab-panel-instructor course-tab-panel" id="tab-instructor">
                                        <div class="thim-about-author">
                                            <div class="section-header wow fadeInDown" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInDown;">
                                                <h4>عن<span> المدرب</span></h4>

                                            </div>
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="container">
                                                            <div class="thumbnail">
                                                                <img id="mainImg"
                                                                     src="{{asset('site-assets/images/Dr_Image.jpg')}}"
                                                                     alt="Mt. Fuji">
                                                                <div class="lower">
                                                                    <div id="gradient"></div>
                                                                    <!-- <div id="flag">
                                                                        <img src="site-assets/images/favicon.png"
                                                                            alt="Japanese Flag">
                                                                    </div> -->
                                                                    <div class="mainInfo">
                                                                        <h1 id="title">  {{$course->instructor->username}} <i class="fas fa-balance-scale"></i></h1>
                                                                        <h3 id="subtitle"></h3>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="description">
                                                                <p> عضو الهيئة السعودية للمحامين.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">

                                                        <div class="author-top">
                                                            <a class="name" href="#">
                                                                {{$course->instructor->name}}
                                                            </a>
                                                            <p class="job">مستشار بمركز التدريب العدلي بوزارة العدل</p>
                                                        </div>
                                                        <ul class="thim-author-social">
                                                            <a href="#" class="icon-button twitter"><i class="fab fa-twitter"></i><span></span></a>



                                                            <a href="#" class="icon-button pinterest"><i class="fab fa-linkedin-in"></i><span></span></a>
                                                        </ul>
                                                        <div class="nb-head ">

                                                            <div class="ev-slider-arrows head-arrow">
                                                                <button type='button' class='slick-next slick-arrow'><i class="fas fa-long-arrow-alt-right"></i>
                                                                </button>
                                                                <button type='button' class='slick-prev slick-arrow'><i class="fas fa-long-arrow-alt-left"></i>
                                                                </button>
                                                            </div>
                                                        </div>


                                                        <div class="event-slider author-description">
                                                            <div class="event-item event-item2">
                                                                <a href="#"><p>- عضو الهيئة السعودية للمحامين</p></a>

                                                            </div>
                                                            <div class="event-item event-item2">
                                                                <a href="#"><p>- محكّم معتمد لدى المركز السعودي للتحكيم التجاري</p></a>

                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- وسيط معتمد لدى المركز السعودي للتحكيم التجاري</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- وسيط معتمد لدى المركز العربي للوساطة</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">
                                                                <a href="#"><p>- مستشار متفرغ بمركز التدريب العدلي- وزارة العدل من تاريخ20/4/2020م ، وحتى الآن.</p></a>

                                                            </div>
                                                            <div class="event-item event-item2">
                                                                <a href="#"><p>- خبير غير متفرغ بمركز التدريب العدلي- وزارة العدل من تاريخ 20/10/2019م، وحتى 19/4/2020م.</p></a>

                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- عضو فريق تطوير لائحة نظام المحاماة بوزارة العدل من تاريخ 23/10/2019م، وحتى الآن.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- مستشار وممثل قانوني غير متفرغ لعدد من الشركات المحلية والدولية في المملكة.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- تأسيس عدد من الشركات الأجنبية في المملكة.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- صائغ قانوني معتمد من المجلس العربي للقضاء العرفي.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- عميداً مكلفاً لعمادة البحث العلمي بالجامعة السعودية الإلكترونية من تاريخ 10-28/5/1441ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- أمين المجلس العلمي بالجامعة السعودية الإلكترونية من تاريخ 25/12/1440ه، وحتى الآن.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- مستشار قانوني لمبادرة إنشاء مركز تدريب إلكتروني لصالح الجامعة السعودية الإلكترونية من تاريخ 1/1/2019م، 30/12/2019م.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- عميد الدراسات العليا بالجامعة السعودية الإلكترونية من تاريخ 30/2/1440 ه، وحتى 17/9/1441ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- رئيس فريق مشروع إعداد الرؤية التطويرية للجامعة 2020-2025م، من تاريخ 26/3/1440ه، وحتى تاريخ 25/12/1440ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- أستاذ متعاون مع كلية الحقوق والعلوم السياسية بجامعة الملك سعود من تاريخ 2/6/1439 وحتى 29/8/1439 ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- وكيل كلية العلوم والدراسات النظرية بالجامعة السعودية الإلكترونية من تاريخ 22/3/1439 ه وحتى 29/2/1440 ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- رئيس قسم القانون بالجامعة السعودية الإلكترونية من تاريخ 9/3/1438 ه حتى 21/3/1439 ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- عضو هيئة التدريس بقسم القانون   من عام 1438ه، وحتى الآن.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- محاضر بقسم القانون بالجامعة السعودية الإلكترونية، 1435 - 1438ه.</p></a>
                                                            </div>
                                                            <div class="event-item event-item2">

                                                                <a href="#"><p>- مستشاراً قانونياً في مكتب عسير القرني -محامون ومستشارون- لمدة من 25/4/2009مـ -24/5/2010 م.</p></a>
                                                            </div>
                                                        </div>

                                                        <div class="author-description">
                                                            <!-- <a href="#"><p>- عضو الهيئة السعودية للمحامين</p></a>
                                                            <a href="#"><p>- محكّم معتمد لدى المركز السعودي للتحكيم التجاري</p></a>
                                                            <a href="#"><p>- وسيط معتمد لدى المركز السعودي للتحكيم التجاري</p></a>
                                                            <a href="#"><p>- وسيط معتمد لدى المركز العربي للوساطة</p></a> -->
                                                            <!-- <a href="#"><p>- مستشار متفرغ بمركز التدريب العدلي- وزارة العدل من تاريخ20/4/2020م ، وحتى الآن.</p></a> -->
                                                            <!-- <a href="#"><p>- خبير غير متفرغ بمركز التدريب العدلي- وزارة العدل من تاريخ 20/10/2019م، وحتى 19/4/2020م.</p></a> -->
                                                            <!-- <a href="#"><p>- عضو فريق تطوير لائحة نظام المحاماة بوزارة العدل من تاريخ 23/10/2019م، وحتى الآن.</p></a> -->
                                                            <!-- <a href="#"><p>- مستشار وممثل قانوني غير متفرغ لعدد من الشركات المحلية والدولية في المملكة.</p></a> -->
                                                            <!-- <a href="#"><p>- تأسيس عدد من الشركات الأجنبية في المملكة.</p></a> -->
                                                            <!-- <a href="#"><p>- صائغ قانوني معتمد من المجلس العربي للقضاء العرفي.</p></a> -->
                                                            <!-- <a href="#"><p>- عميداً مكلفاً لعمادة البحث العلمي بالجامعة السعودية الإلكترونية من تاريخ 10-28/5/1441ه.</p></a> -->
                                                            <!-- <a href="#"><p>- أمين المجلس العلمي بالجامعة السعودية الإلكترونية من تاريخ 25/12/1440ه، وحتى الآن.</p></a> -->
                                                            <!-- <a href="#"><p>- مستشار قانوني لمبادرة إنشاء مركز تدريب إلكتروني لصالح الجامعة السعودية الإلكترونية من تاريخ 1/1/2019م، 30/12/2019م.</p></a> -->
                                                            <!-- <a href="#"><p>- عميد الدراسات العليا بالجامعة السعودية الإلكترونية من تاريخ 30/2/1440 ه، وحتى 17/9/1441ه.</p></a> -->
                                                            <!-- <a href="#"><p>- رئيس فريق مشروع إعداد الرؤية التطويرية للجامعة 2020-2025م، من تاريخ 26/3/1440ه، وحتى تاريخ 25/12/1440ه.</p></a> -->
                                                            <!-- <a href="#"><p>- أستاذ متعاون مع كلية الحقوق والعلوم السياسية بجامعة الملك سعود من تاريخ 2/6/1439 وحتى 29/8/1439 ه.</p></a> -->
                                                            <!-- <a href="#"><p>- وكيل كلية العلوم والدراسات النظرية بالجامعة السعودية الإلكترونية من تاريخ 22/3/1439 ه وحتى 29/2/1440 ه.</p></a> -->
                                                            <!-- <a href="#"><p>- رئيس قسم القانون بالجامعة السعودية الإلكترونية من تاريخ 9/3/1438 ه حتى 21/3/1439 ه.</p></a> -->
                                                            <!-- <a href="#"><p>- عضو هيئة التدريس بقسم القانون   من عام 1438ه، وحتى الآن.</p></a> -->
                                                            <!-- <a href="#"><p>- محاضر بقسم القانون بالجامعة السعودية الإلكترونية، 1435 - 1438ه.</p></a>
                                                            <a href="#"><p>- مستشاراً قانونياً في مكتب عسير القرني -محامون ومستشارون- لمدة من 25/4/2009مـ -24/5/2010 م.</p></a> -->

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="tab-pane course-tab-panel-reviews course-tab-panel" id="tab-reviews">--}}
{{--                                        <div class="course-rating">--}}
{{--                                            <div class="section-header wow fadeInDown" style="visibility: visible;  animation-name: fadeInDown;">--}}
{{--                                                <h4><span> المراجعات</span></h4>--}}

{{--                                            </div>--}}
{{--                                            <div class="average-rating">--}}
{{--                                                <p class="rating-title">متوسط تقييم</p>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <div class="average-value" itemprop="ratingValue">0</div>--}}
{{--                                                    <div class="review-star">--}}
{{--                                                        <div class="review-stars-rated">--}}
{{--                                                            <ul class="review-stars">--}}
{{--                                                                <li><span class="far fa-star"></span></li>--}}
{{--                                                                <li><span class="far fa-star"></span></li>--}}
{{--                                                                <li><span class="far fa-star"></span></li>--}}
{{--                                                                <li><span class="far fa-star"></span></li>--}}
{{--                                                                <li><span class="far fa-star"></span></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="review-amount" itemprop="ratingCount">--}}
{{--                                                        0 rating--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="detailed-rating">--}}
{{--                                                <p class="rating-title">تقييم مفصل</p>--}}

{{--                                                <div class="rating-box">--}}
{{--                                                    <div class="detailed-rating">--}}
{{--                                                        <div class="stars">--}}
{{--                                                            <div class="key">--}}
{{--                                                                ٥--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar">--}}
{{--                                                                <div class="full_bar">--}}
{{--                                                                    <div style="width:50% "></div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span>50%</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="stars">--}}
{{--                                                            <div class="key">--}}
{{--                                                                ٤--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar">--}}
{{--                                                                <div class="full_bar">--}}
{{--                                                                    <div style="width:0%"></div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span>0%</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="stars">--}}
{{--                                                            <div class="key">--}}
{{--                                                                ٣--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar">--}}
{{--                                                                <div class="full_bar">--}}
{{--                                                                    <div style="width:0%"></div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span>0%</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="stars">--}}
{{--                                                            <div class="key">--}}
{{--                                                                ٢--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar">--}}
{{--                                                                <div class="full_bar">--}}
{{--                                                                    <div style="width:50%"></div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span>50%</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="stars">--}}
{{--                                                            <div class="key">--}}
{{--                                                                ١--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar">--}}
{{--                                                                <div class="full_bar">--}}
{{--                                                                    <div style="width:0%"></div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <span>0%</span>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-stars-rated">--}}
{{--                                                <div class="review-stars empty"></div>--}}
{{--                                                <div class="review-stars filled" style="width:0%;"></div>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInUp" data-wow-offset="20" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="related-courses">
                                <h3 class="p-header">كورسات ذات صله</h3><span class="pull-left"></span>
                                <div class="clear">
                                    <div   class="owl-carousel owl-carousell owl-theme slides" style="direction: ltr;">

                                        @foreach($related_courses as $course)
                                            <div class="item">
                                                <div class="course-item-wrapper">
                                                    <div class="course-thumbnail">
                                                        <a href="{{url('course/'.$course->id)}}"><img src="{{asset($course->image != null?$course->image:'site-assets/images/2.jpg')}}" alt=""></a>
                                                        <div class="price">{{$course->price}} SR</div>
                                                    </div>
                                                    <div class="thim-course-content">
                                                        <div class="course-author">
                                                            <div class="course-author-content">
                                                                <img alt="" src="{{asset('images/Dr_Image.jpg')}}" class="avatar avatar-96 photo">
                                                                <div class="author-contain">
                                                                    <label>المعلم</label>
                                                                    <div class="value" itemprop="name">
                                                                        <a href="{{url('course/'.$course->id)}}">{{$course->instructor->name}}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h2 class="course-title">
                                                            <a href="{{url('course/'.$course->id)}}">{{$course->title}}</a>
                                                        </h2>
                                                        <div class="course-meta">
                                                            <span> <i class="fa fa-user"></i>94 متدرب</span>
                                                            <span>
                                                          <i class="fa fa-tag"></i>
                                                          <a href="{{url('course/'.$course->id)}}">{{$course->category->title}}</a>
                                                      </span>
                                                            <span class="star"><i class="fa fa-star"></i> 3</span>
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
                <div class="col-sm-12 col-md-4">
                    <div class="course-info-right sticky-sidebar">
                        <div class="sticky-content">
                            <div class="course-info-wrapper">
                                <div class="right-col__content">
                                    <div class="right-col__wrapper">
                                        <div class="course-thumbnail">
                                            <img
                                                src="{{asset($course->image)}}"
                                                class="attachment-full size-full wp-post-image img-fluid" alt="">
                                        </div>
                                        <div class="course-payment">
                                            <div class="course-price">
                                                <span class="label">السعر</span>
                                                <div class="value ">
                                                    {{$course->price}} ريـال
                                                </div>
                                            </div>
                                            <div class="lp-course-buttons">
                                                <form name="purchase-course" class="purchase-course form-purchase-course " method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="purchase-course" value="5181">
                                                    <input type="hidden" name="purchase-course-nonce" value="1ad69a85d7">
                                                    <button class="lp-button button button-purchase-course thim-enroll-course-button">
                                                        سجل الآن
                                                    </button>
                                                    <input type="hidden" name="redirect_to" value="">
                                                    <input type="hidden" name="single-purchase" value="yes">
                                                    <input type="hidden" name="add-to-cart" value="5181">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="thim-course-feature">
                                            <ul>
                                                <li class="lectures-feature">
                                                    <img src="{{asset('site-assets/images/agenda (1).png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="value">{{$course->appointments()->count()}}</span>
                                                    <span class="label">محاضرات</span>
                                                </li>
                                                <li class="quizzes-feature">
                                                    <img src="{{asset('site-assets/images/exam.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="value">{{$course->exam_check == 1 ? "يوجد":"لا يوجد"}}</span>
                                                    <span class="label">إختبارات</span>
                                                </li>
                                                <li class="duration-feature">
                                                    <img src="{{asset('site-assets/images/calendar2.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="label">{{$course->start_date}}</span>
                                                    <span class="value">

                                                    </span>
                                                </li>
                                                <li class="duration-feature">
                                                    <img src="{{asset('site-assets/images/calendar2.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="label">{{$course->end_date}}</span>
                                                    <span class="value">

                                                    </span>
                                                </li>
{{--                                                <li class="skill-feature">--}}
{{--                                                    <img src="{{asset('site-assets/images/schedule.png')}}" width="20" class="im-fluid" style="width:20px !important">--}}
{{--                                                    <span class="label">المدة الزمنية</span>--}}
{{--                                                    <span class="value">٢ ساعات ٣٠ الدقائق</span>--}}
{{--                                                </li>--}}
                                                <li class="skill-feature">
                                                    <img src="{{asset('site-assets/images/teaching.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                    @if($course->skill_level == "m")
                                                    <span class="label">متوسظة</span>
                                                    @elseif($course->skill_level == "l")
                                                        <span class="label">منخفضة</span>
                                                    @else
                                                        <span class="label">عالية</span>
                                                    @endif
                                                    <span class="value"></span>
                                                </li>

                                                <li class="students-feature">
                                                    <img src="{{asset('site-assets/images/man.png')}}" width="20" class="im-fluid" style="width:20px !important">
                                                    <span class="value"></span>
                                                    <span class="label"> 94 طالب</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="social_share">
                                            <ul class="thim-social-share">
                                                <li class="heading">Share:</li>
                                                <li>
                                                    <div class="facebook-social">
                                                        <a target="_blank" class="facebook" href="#" title="Facebook">
                                                            <i class="fab fa-facebook"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="googleplus-social">
                                                        <a target="_blank" class="googleplus" href="#" title="Google Plus">
                                                            <i class="fab fa-google"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="twitter-social">
                                                        <a target="_blank" class="twitter" href="#" title="Twitter">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pinterest-social">
                                                        <a target="_blank" class="pinterest" href="" title="Pinterest">
                                                            <i class="fab fa-pinterest-p"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection