


<div class="sidebar-content">
   
  @if(Auth::user()->role == 'admin')
    <!-- Users views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item">
                <a href="{{ route('users-list') }}"><i class="fas fa-users"></i>
                    <span> مستخدمي النظام </span>
                </a>
            </div>
        </nav>
    </div>
   @endif

    <!-- Categories views -->
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item">
                <a href="{{ route('courses-list') }}"><i class="fas fa-laptop-code"></i>
                    <span> الدورات التدريبة </span>
                </a>

            </div>
        </nav>
    </div>
 <!-- Categories views -->
 <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item">
                <a href="{{ route('password') }}"><i class="fas fa-unlock-alt"></i>
                    <span> تغيير كلمة السر </span>
                </a>

            </div>
        </nav>
    </div>

</div>
</div>


