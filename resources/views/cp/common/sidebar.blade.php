<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'dashboard') active @endif">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('images/home.png') }}" style="width: 22px">
                    <span> الصفحة الرئيسية </span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Users views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item">
                <a href="{{ route('users-list') }}"><img src="{{ asset('images/training.png') }}" style="width: 22px">
                    <span> مستخدمي النظام </span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Categories views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item">
                <a href="{{ route('categories-list') }}"><img src="{{ asset('images/categories.png') }}" style="width: 22px">
                    <span> الفئات المستهدفة </span>
                </a>

            </div>
        </nav>
    </div>

    <!-- Classifications views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div
                class="nav-item ">
                <a href="{{ route('classifications-list') }}"><img src="{{ asset('images/classifications.png') }}" style="width: 22px">
                    <span> تصنيفات الدورات </span>
                </a>
            </div>
        </nav>
    </div>


    <!-- Courses views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item ">
                <a href="{{ route('courses-list') }}"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                    <span> قائمة الدورات </span>
                </a>
            </div>
            </nav>
        </div>


        <!-- Courses views -->
        <!-- <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item has-sub @if($active == 'create-webinar' || $active == 'zoom') open @endif">
                    <a href="javascript:void(0)"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                        <span>Zoom</span>
                    </a>
                    <div class="submenu-content">
                        <a href="{{ route('create-webinar') }}" class="menu-item @if($active == 'create-webinar') active @endif"><img src="{{ asset('images/list.png') }}" style="width: 20px"> Create Webinar </a>
                        <a href="{{ route('webinars-list') }}" class="menu-item @if($active == 'webinars-list') active @endif"> <img src="{{ asset('images/add.png') }}" style="width: 20px"> Webinars </a>
                    </div>
                </div>
            </nav>
        </div> -->




        <!-- Notifiction views -->
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item ">
                    <a href="{{ route('notify-list') }}"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                        <span> ادارة  الاشعارات </span>
                    </a>
                </div>
            </nav>
        </div>


        <!-- Ads views -->
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item">
                    <a href="{{ route('advertisments-list') }}"><img src="{{ asset('images/list.png') }}" style="width: 22px">
                        <span> ادراة  الاعلانات </span>
                    </a>
                </div>
            </nav>
        </div>



     <!-- Testmonials views -->
     <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item">
                <a href="{{ route('testmonials-list') }}"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                    <span>{{__('app.Testmonials')}} </span>
                </a>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item ">
                <a href="{{ route('questionnaires-list') }}"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                    <span> قائمة الإستبيانات </span>
                </a>
            </div>
        </nav>
    </div>

</div>
</div>


