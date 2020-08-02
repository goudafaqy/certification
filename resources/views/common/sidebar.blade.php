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
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item has-sub @if($active == 'users-list' || $active == 'users-add') open @endif">
                    <a href="javascript:void(0)"><img src="{{ asset('images/training.png') }}" style="width: 22px">
                        <span> مستخدمي النظام </span>
                    </a>
                    <div class="submenu-content">
                        <a href="{{ route('users-list') }}" class="menu-item @if($active == 'users-list') active @endif"><img src="{{ asset('images/list.png') }}" style="width: 20px"> قائمة المستخدمين </a>
                        <a href="{{ route('users-add') }}" class="menu-item @if($active == 'users-add') active @endif"> <img src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة مستخدم </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>