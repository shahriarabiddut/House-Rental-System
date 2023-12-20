<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15 col-md-4">
            @isset($SiteOption)
            <img src="{{ asset($SiteOption[1]->value) }}" alt="" srcset="" width="100%">
            @endisset
        </div>
        <div class="sidebar-brand-text mx-2 col-md-8">User Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

   
    <!--Logout - Dashboard -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item active">
            
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar - Logout - CopyRight) -->
    @include('../layouts/sidebar_toggle')
    <!-- End Sidebar Toggler (Sidebar - Logout - CopyRight) -->

    

</ul>
<!-- End of Sidebar -->