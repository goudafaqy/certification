<div class="sidebar-content">

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item has-sub @if($active == 'courses-list' || $active == 'courses-list2') open @endif">
                <a href="javascript:void(0)">
                    <img src="{{ asset('images/training.png') }}" style="width: 22px">
                    <span>  الدورات التدريبية </span>
                </a>
                <div class="submenu-content">
                    <a href="javascript:void(0)" class="menu-item @if($active == 'courses-list') active @endif">
                        <img src="{{ asset('images/cou.png') }}" style="width: 20px"> الدورات التدريبية الحالية </a>
                    <a href="javascript:void(0)" class="menu-item @if($active == 'courses-list2') active @endif">
                        <img src="{{ asset('images/back.png') }}" style="width: 20px"> الدورات التدريبية السابقة </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item has-sub @if($active == 'digital-order') open @endif">
                <a href="javascript:void(0)">
                    <img src="{{ asset('images/training.png') }}" style="width: 22px">
                    <span>  الخدمات الالكترونية</span>
                </a>
                <div class="submenu-content">
                    <a href="javascript:void(0)" class="menu-item @if($active == 'digital-order') active @endif">
                        طلب افادة <i class="ik ik-menu"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'dashboard') active @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/cal.png') }}" style="width: 22px">
                    <span>  التقويم التدريبي</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'dashboard') active @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/graph.png') }}" style="width: 22px">
                    <span>  الإستبيانات</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item @if($active == 'dashboard') active @endif">
                <a href="javascript:void(0)"><img src="{{ asset('images/supp.png') }}" style="width: 22px">
                    <span>  الدعم الفني</span>
                </a>
            </div>
        </nav>
    </div>


</div>
</div>
