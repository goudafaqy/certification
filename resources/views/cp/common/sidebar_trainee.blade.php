<div class="sidebar-content">

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'dashboard') active @endif">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('images/home.png') }}" style="width: 22px">
                    <span>  الصفحة الرئيسية</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'trainee-courses') active @endif">
                <a href="{{ route('trainee-courses') }}"><img src="{{ asset('images/current.png') }}" style="width: 22px">
                    <span>  الدورات التدريبية</span>
                </a>
            </div>
        </nav>
    </div>
</div>
</div>
