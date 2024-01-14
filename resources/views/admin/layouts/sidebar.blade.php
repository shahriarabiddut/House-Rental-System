<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15 col-md-4">
            @isset($SiteOption)
            <img src="{{ asset($SiteOption[1]->value) }}" alt="" srcset="" width="100%">
            @endisset
        </div>
        <div class="sidebar-brand-text mx-2 col-md-8">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Property Management
   </div>
   <!-- Nav Item Propertys - Pages Collapse Menu -->
   <li class="nav-item">
       <a class="nav-link @if(!request()->is('admin/property*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseproperty"
           aria-expanded="true" aria-controls="collapseproperty">
           <i class="fas fa-fw fa-table"></i>
           <span>Property</span>
       </a>
       <div id="collapseproperty" class="collapse @if(request()->is('admin/property*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Property Management</h6>
               <a class="collapse-item" href="{{ route('admin.property.index') }}">View Properties</a>
               <a class="collapse-item" href="{{ route('admin.agreement.index') }}">View Agreements</a>
               <a class="collapse-item" href="{{ route('admin.payment.index') }}">View Payments</a>
               <a class="collapse-item" href="{{ route('admin.booking.index') }}">View Bookings</a>
           </div>
       </div>
   </li>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
         User System
    </div>
    <!-- Nav Item Customer - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/user*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
        <div id="collapseOne" class="collapse @if(request()->is('admin/user*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management</h6>
                <a class="collapse-item" href="{{ route('admin.user.index') }}">View All</a>
                <a class="collapse-item" href="{{ route('admin.user.create') }}">Add new </a>
            </div>
        </div>
    </li>


   
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
         Contact Messages
    </div>
    <!-- Nav Item Support - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('user/contact*'))
            collapsed
        @endif" href="#" data-toggle="collapse" data-target="#collapseEight"
            aria-expanded="true" aria-controls="collapseEight">
            <i class="fas fa-ticket-alt"></i>
            <span>Contact Message</span>
        </a>
        <div id="collapseEight" class="collapse @if(request()->is('user/contact*')) show @endif" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Contact Message Management</h6>
                <a class="collapse-item" href="{{-- route('admin.support.index') --}}">View Messages</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
    System Settings 
    </div>
    <!-- Nav Email Services - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.settings.edit') }}">
            <i class="fa fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar - Logout - CopyRight) -->
    @include('../layouts/sidebar_toggle')
    <!-- End Sidebar Toggler (Sidebar - Logout - CopyRight) -->
</ul>