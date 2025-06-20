<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? 'LaraShop: ' . $title : 'LaraShop: Welcome To Our Big Store Market' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @else
            {{--  --}}
        @endif
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body>
        
        <x-modals.image-view></x-modals.image-view>

        <x-modals.desc></x-modals.desc>

        <x-modals.delete>
            <x-slot:target>{{__('deleteCate')}}</x-slot:target>
            <x-slot:id>{{__('deletingCates')}}</x-slot:id>
        </x-modals.delete>
        
        <x-modals.delete>
            <x-slot:target>{{__('deleteProduct')}}</x-slot:target>
            <x-slot:id>{{__('deletingProducts')}}</x-slot:id>
        </x-modals.delete>
        
        <x-modals.delete>
            <x-slot:target>{{__('deleteMember')}}</x-slot:target>
            <x-slot:id>{{__('deletingMembers')}}</x-slot:id>
        </x-modals.delete>
        
        {{--
        Loading The Right Header For Control Panel || Customers View
        --}}
        @if (Route::currentRouteName('admin'))
            <div class="panel">
            <x-header.panel :$pagename></x-header.panel>
        @else
            <x-header.user></x-header.user>
        @endif
        {{-- 
            Site Body Goes Here 
        --}}
        <div class="container-fluid">
            <main class="content py-4 px-3 mx-2 rounded-4">
                        
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

                {{ $slot }}
            </main>
        </div>

        {{-- 
            Loading The Right Footer For Control Panel || Customers View 
        --}}
        @if (Route::currentRouteName('admin'))
            <x-footer.panel></x-footer.panel>
            </div>
        @else
            <x-footer.user></x-footer.user>
        @endif

        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script type="module" src="{{asset('js/chart_4.4.1.min.js')}}"></script>
        <script defer src="{{asset('js/upload.js')}}"></script>
        <script defer src="{{asset('js/modals.js')}}"></script>
        <script defer src="{{asset('js/main.js')}}"></script>

    </body>
</html>
