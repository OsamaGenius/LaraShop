<x-layout.main>
    <x-slot:title>{{ 'Sending verifiction code' }}</x-slot:title>

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
                    
                    {{-- Login using LaraShop Account --}}
                    <form class="py-3" action="{{route('sendCode.action')}}" method="POST">
                        @csrf
                        {{-- Email --}}
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Email@gmail.com')}}</x-slot:placeholder>
                            <x-slot:known>{{__('email')}}</x-slot:known>
                            <x-slot:value>{{old('email')}}</x-slot:value>
                            <x-slot:type>{{__('email')}}</x-slot:type>
                        </x-form.input_req>
                        {{-- Submit --}}
                        <div class="text-end">
                            <button class="btn bg-gradient-dark text-white w-25"><i class="fas fa-location-arrow me-2"></i>{{__('Send')}}</button>
                        </div>
                    </form>
                </div>
            </x-card.shadow>
        
        </div>

    </section>

</x-layout.main>