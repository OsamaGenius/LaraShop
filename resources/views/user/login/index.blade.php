<x-layout.main>
    <x-slot:title>{{ {{__('Start your session')}} }}</x-slot:title>
    <x-slot:pagename>{{ __('Login LaraShop Market') }}</x-slot:pagename>

    <section class="auth-forms py-5 w-100 w-md-50">

        <div class="container">

            <x-card.shadow>
                <div class="img-logo text-center">
                    <img class="w-75" src="{{asset('imgs/Logo.png')}}" alt="Shop Logo">
                </div>
                <div class="pt-5">
                    
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
        
                    {{-- Login using Google | Facebook --}}
                    <div class="btn-group w-100 py-4">
                        <button class="btn btn-outline-danger"><i class="fab fa-google me-2"></i>{{__('Google')}}</button>
                        <button class="btn btn-outline-primary"><i class="fab fa-facebook-f me-2"></i>{{__('Facebook')}}</button>
                    </div>
                    {{-- Divider --}}
                    <div class="text-center py-3">
                        <i class="fas fa-arrow-right me-3"></i>{{__('OR')}}<i class="fas fa-arrow-left ms-3"></i>
                    </div>
                    {{-- Login using LaraShop Account --}}
                    <form class="py-3" action="{{route('login.action')}}" method="POST">
                        @csrf
                        {{-- Email | Username --}}
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Login using your Email or Username')}}</x-slot:placeholder>
                            <x-slot:known>{{__('username')}}</x-slot:known>
                            <x-slot:value>{{old('username')}}</x-slot:value>
                            <x-slot:type>{{__('text')}}</x-slot:type>
                        </x-form.input_req>
                        {{-- Password --}}
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Your Password')}}</x-slot:placeholder>
                            <x-slot:known>{{__('password')}}</x-slot:known>
                            <x-slot:value>{{__('')}}</x-slot:value>
                            <x-slot:type>{{__('password')}}</x-slot:type>
                        </x-form.input_req>
                        {{-- Submit --}}
                        <div class="d-flex justify-content-between">
                            <a class="ms-1 text-decoration-none" href="{{route('sendCode.page')}}">{{__('Forget password')}}</a>
                            <button class="btn bg-gradient-dark text-white w-25"><i class="fas fa-unlock me-2"></i>Login</button>
                        </div>
                    </form>
                </div>
                {{-- Create Account Link --}}
                <div class="py-3 text-center border-top">
                    <p class="p-0 m-0">
                        {{__('Don\'t have an account')}}
                        <a class="ms-2 text-decoration-none" href="{{route('register')}}">
                            {{__('Create Account')}}
                        </a>
                    </p>
                </div>
            </x-card.shadow>
        
        </div>

    </section>

</x-layout.main>