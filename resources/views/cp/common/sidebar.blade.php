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
            <div class="nav-item has-sub @if($active == 'users-list' || $active == 'users-add') open @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/training.png') }}" style="width: 22px">
                    <span> مستخدمي النظام </span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('users-list') }}"
                       class="menu-item @if($active == 'users-list') active @endif"><img
                            src="{{ asset('images/list.png') }}" style="width: 20px"> قائمة المستخدمين </a>
                    <a href="{{ route('users-add') }}" class="menu-item @if($active == 'users-add') active @endif"> <img
                            src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة مستخدم </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Categories views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item has-sub @if($active == 'categories-list' || $active == 'categories-add') open @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/categories.png') }}" style="width: 22px">
                    <span> الفئات المستهدفة </span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('categories-list') }}"
                       class="menu-item @if($active == 'categories-list') active @endif"><img
                            src="{{ asset('images/list.png') }}" style="width: 20px"> قائمة الفئات المستهدفة </a>
                    <a href="{{ route('categories-add') }}"
                       class="menu-item @if($active == 'categories-add') active @endif"> <img
                            src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة فئة جديدة </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Classifications views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div
                class="nav-item has-sub @if($active == 'classifications-list' || $active == 'classifications-add') open @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/classifications.png') }}" style="width: 22px">
                    <span> تصنيفات الدورات </span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('classifications-list') }}"
                       class="menu-item @if($active == 'classifications-list') active @endif"><img
                            src="{{ asset('images/list.png') }}" style="width: 20px"> قائمة التصنيفات </a>
                    <a href="{{ route('classifications-add') }}"
                       class="menu-item @if($active == 'classifications-add') active @endif"> <img
                            src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة تصنيف جديد </a>
                </div>
            </div>
        </nav>
    </div>


    <!-- Courses views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item has-sub @if($active == 'courses-list' || $active == 'courses-add') open @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                    <span> قائمة الدورات </span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('courses-list') }}"
                       class="menu-item @if($active == 'courses-list') active @endif"><img
                            src="{{ asset('images/list.png') }}" style="width: 20px"> قائمة الدورات </a>
                    <a href="{{ route('courses-add') }}" class="menu-item @if($active == 'courses-add') active @endif">
                        <img src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة دورة جديدة </a>
                </div>
            </div>
            </nav>
        </div>


        <!-- Courses views -->
        <div class="nav-container">
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
        </div>
    



        <!-- Notifiction views -->
        <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item has-sub @if($active == 'notify-list' || $active == 'notify-add') open @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/courses.png') }}" style="width: 22px">
                    <span> قائمة  الاشعارات </span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('notify-list') }}"
                       class="menu-item @if($active == 'notify-list') active @endif"><img
                            src="{{ asset('images/list.png') }}" style="width: 20px">  قائمة  الاشعارات </a>
                    <a href="{{ route('notify-add') }}" class="menu-item @if($active == 'notify-add') active @endif">
                        <img src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة اشعار جديدة </a>
                </div>
            </div>
        </nav>
    </div>
</div>
</div>


