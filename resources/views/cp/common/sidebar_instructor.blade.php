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
            <div class="nav-item has-sub @if($active == 'instructor-courses-current' || $active == 'instructor-courses-past') open @endif">
                <a href="javascript:void(0)">
                    <img src="{{ asset('images/training.png') }}" style="width: 22px">
                    <span>  الدورات التدريبية </span>
                </a>
                <div class="submenu-content">
                    <a href="{{route('instructor-courses-list', ['type' => 'current'])}}" class="menu-item @if($active == 'instructor-courses-current') active @endif">
                        <img src="{{ asset('images/current.png') }}" style="width: 20px"> الدورات الحالية </a>
                    <a href="{{route('instructor-courses-list', ['type' => 'past'])}}" class="menu-item @if($active == 'instructor-courses-past') active @endif">
                        <img src="{{ asset('images/previous.png') }}" style="width: 20px"> الدورات السابقة </a>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'helpdesk') active @endif">
                <a href="{{ route('showhelpDesk') }}"><img src="{{ asset('images/home.png') }}" style="width: 22px">
                    <span>  الدعم الفنى </span>
                </a>
            </div>
        </nav>
    </div>
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'helpdesk') active @endif">
                <a href="{{ route('showhelpDesk') }}"><img src="{{ asset('images/home.png') }}" style="width: 22px">
                    <span>  التقويم التدريبى </span>
                </a>
            </div>
        </nav>
    </div>

</div>
</div>
