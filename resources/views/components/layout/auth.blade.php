<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$pagename != '' ? 'LaraShop: ' . $pagename : 'LaraShop Market'}}</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @else
        {{--  --}}
    @endif
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body class="auth">
    
    <div class="container">
        
        <div class="holder">

            @if (session('success'))
                <x-messages>
                    <x-slot:class>{{__('alert-success')}}</x-slot:class>
                    {{ session('success') }}
                </x-messages>
            @endif

            @if (session('error'))
                <x-messages>
                    <x-slot:class>{{__('alert-danger')}}</x-slot:class>
                    {{ session('error') }}
                </x-messages>
            @endif

            <div class="image text-center mb-3">
                <img src="{{asset('imgs/Logo.png')}}" alt="Logo">
            </div>

            <h4 class="text-center mb-4">{{$title}}</h4>
            
            <form action="{{$route}}" method="{{$method}}">

                @csrf

                {{$slot}}

            </form>
            
        </div>

    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>