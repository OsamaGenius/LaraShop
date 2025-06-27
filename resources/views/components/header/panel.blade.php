<header class="px-0 py-4 bg-gradient-dark shadow-light"> 
    
    <div class="container-fluid px-4 elements"> 
    
        <div class="nav-header pt-4 pb-2 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> 
    
            <h1 class="navbar-brand"> 
                <img class="brand-logo" src="{{asset('imgs/Logo.png')}}" alt="logo">
            </h1> 
            
            <ul class="nav col-12 col-lg-auto mx-lg-auto mb-2 mb-md-0"> 
                <li><a href="{{route('dashboard')}}" class="nav-link px-2 @if($pagename == 'Dashboard') active @endif">{{__('Dashboard')}}</a></li> 
                <li><a href="{{route('products')}}" class="nav-link px-2 @if($pagename == 'Products') active @endif">{{__('Products')}}</a></li> 
                <li><a href="{{route('categories')}}" class="nav-link px-2 @if($pagename == 'Categories') active @endif">{{__('Categories')}}</a></li> 
                <li><a href="{{route('members')}}" class="nav-link px-2 @if($pagename == 'Members') active @endif">{{__('Members')}}</a></li> 
            </ul> 
            
            <a href="" class="profile d-block link-body-emphasis">
                <i title="Settings" class="fas fa-gear me-4"></i>
            </a>

            <a href="" class="profile d-block link-body-emphasis">
                <i title="Search" class="fas fa-search me-4"></i>
            </a>

            {{-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> 
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search"> 
            </form> --}}
            
            <div class="dropdown text-end"> 
                <a href="#" class="profile d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="{{asset('storage/'.Auth::guard('panel')->user()->file)}}" alt="mdo" width="32" height="32" class="rounded-circle"> 
                </a>
                <ul class="dropdown-menu text-small" style=""> 
                    <li><a class="dropdown-item" href="#">{{__('New project')}}</a></li> 
                    <li><a class="dropdown-item @if($pagename == 'Profile') active @endif" href="{{route('profile')}}">{{__('Profile')}}</a></li> 
                    <li><hr class="dropdown-divider"></li> 
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}">{{__('Sign out')}}</a></li> 
                </ul> 
            </div> 
        
        </div> 
    
        <div class="divider-light mt-2"></div>

        <nav class="py-4">
            <h2>{{ isset($pagename) && $pagename != '' ? $pagename : 'Wrong' }}</h2>
        </nav>
        
    </div>
    
</header>
