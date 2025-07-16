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
                    <form class="py-3" action="{{route('reset.action', [$token, $email])}}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Password --}}
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('New Password')}}</x-slot:placeholder>
                            <x-slot:known>{{__('password')}}</x-slot:known>
                            <x-slot:value>{{''}}</x-slot:value>
                            <x-slot:type>{{__('password')}}</x-slot:type>
                        </x-form.input_req>
                        {{-- Confirm Password --}}
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Confirm Password')}}</x-slot:placeholder>
                            <x-slot:known>{{__('confirm')}}</x-slot:known>
                            <x-slot:value>{{''}}</x-slot:value>
                            <x-slot:type>{{__('password')}}</x-slot:type>
                        </x-form.input_req>
                        {{-- Submit --}}
                        <div class="text-end">
                            <button class="btn bg-gradient-dark text-white w-25"><i class="fas fa-edit me-2"></i>{{__('Update')}}</button>
                        </div>
                    </form>
                </div>
            </x-card.shadow>
        
        </div>

    </section>

</x-layout.main>