<header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
    <div class="top-header bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="top-contact list-text-white  d-table">
                        <li><a href="#"><i class="fas fa-phone-alt text-success mr-1"></i>+88 @isset($SiteOption) {{ $SiteOption[5]->value }} @endisset</a></li>
                        <li><a href="#"><i class="fas fa-envelope text-success mr-1"></i>@isset($SiteOption) {{ $SiteOption[4]->value }} @endisset</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="top-contact float-right">
                        <ul class="list-text-white d-table">
                        <li><i class="fas fa-user text-success mr-1"></i>
                        @auth
                        <a href="{{ route('logout') }}">Logout</a>
                        @else
                        <a href="{{ route('login') }}">Login </a> | </li>
                        <li><i class="fas fa-user-plus text-success mr-1"></i><a href="{{ route('register') }}"> Register</li>
                        @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav secondary-nav hover-success-nav py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0"> <a class="navbar-brand position-relative" href="{{ route('root') }}"><h2>House Rental</h2></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown"> <a class="nav-link" href="{{ route('root') }}" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                                
                                <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
                                
                                <li class="nav-item"> <a class="nav-link" href="#">Contact</a> </li>										
                                
                                <li class="nav-item"> <a class="nav-link" href="{{ route('property') }}">Properties</a> </li>

                                
                                @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"> <a class="nav-link" href="{{ route('user.profile.home') }}">Profile</a> </li>
                                        @isset(Auth::user()->type)
                                        @if (Auth::user()->type!='tenant')
                                        <li class="nav-item"> <a class="nav-link" href="{{ route('user.property.index') }}">My Property</a> </li>
                                        @endif
                                        @endisset 
                                        <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}">Logout</a> </li>	
                                    </ul>
                                </li>
                                @if (count(Auth::user()->unread) != 0)
                                <li class="nav-item"> <a class="nav-link" href="{{route('root').'/chatify' }}">{{ count(Auth::user()->unread) }} unread messages</a> </li>
                                @else
                                <li class="nav-item"> <a class="nav-link" href="{{route('root').'/chatify' }}">Messages</a> </li>
                                @endif
                                @else
                                <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login/Register</a> </li>
                                @endauth
                                
                            </ul>
                            @isset(Auth::user()->type)
                            @if (Auth::user()->type=='owner')
                                    <a class="btn btn-success d-none d-xl-block" style="border-radius:30px;" href="{{ route('user.property.create') }}">Add Property</a> 
                            @endif
                            @endisset 
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>