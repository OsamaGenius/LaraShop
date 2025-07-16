<header class="@if (Route::currentRouteName() === 'home')
    main-header
@else
    small-header 
@endif mb-0">

    <div class="caption @if (Route::currentRouteName() !== 'home') d-none @endif">
        <div class="container text-center">
            <h1 class="mb-2">LaraShop Market</h1>
            <h2>Fashion | Tech | Home Decore</h1>
            <div class="btn-group mt-3">
                <button class="btn btn-outline-light"><i class="fas fa-book-reader me-2"></i>{{__('About Us')}}</button>
                <button class="btn btn-outline-light"><i class="fas fa-shopping-cart me-2"></i>{{__('Shop Now')}}</button>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{asset('imgs/Logo.png')}}" alt="logo" class="logo">
            </div>
            <button class="navbar-toggler" data-bs-target="#mainMenu" data-bs-toggle="collapse" aria-expanded="false" aria-controls="mainMenu" aria-label="navigation Toggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainMenu">
                {{-- Main Links --}}
                <ul class="navbar-nav w-100 justify-content-center">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link @if (Route::currentRouteName() === 'home') active @endif">{{__('Home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('shop')}}" class="nav-link @if (Route::currentRouteName() === 'shop') active @endif">{{__('Shop')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about')}}" class="nav-link @if (Route::currentRouteName() === 'about') active @endif">{{__('About')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link @if (Route::currentRouteName() === 'contact') active @endif">{{__('Contact')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('faq')}}" class="nav-link @if (Route::currentRouteName() === 'faq') active @endif">{{__('FAQ')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('blogs')}}" class="nav-link @if (Route::currentRouteName() === 'blogs') active @endif">{{__('Blogs')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('support')}}" class="nav-link @if (Route::currentRouteName() === 'support') active @endif">{{__('Support')}}</a>
                    </li>
                </ul>
                {{-- Auth Links --}}
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a href="#" class="nav-link">OsamaGenius</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link @if (Route::currentRouteName() === 'login') active @endif">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('register')}}" class="nav-link @if (Route::currentRouteName() === 'register') active @endif">Register</a>
                        </li>
                    @endguest
                    <li class="nav-item align-content-center">
                        <a href="#" class="nav-link"><i class="fas fa-heart"></i></a>
                    </li>
                    <li class="nav-item align-content-center">
                        <a href="#" class="nav-link"><i class="fas fa-cart-shopping"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

@if (Route::currentRouteName() !== 'home')

    <nav class="breadcrumb mb-0 w-100">
        <div class="container">
            this is breadcrumb
        </div>
    </nav>

@endif
