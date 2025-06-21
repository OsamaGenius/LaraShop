<x-layout.auth>
    <x-slot:title>{{__('Login to start your session')}}</x-slot:title>
    <x-slot:route>{{''}}</x-slot:route>
    <x-slot:pagename>{{__('Login into LaraShop')}}</x-slot:pagename>

    <x-form.input_req>
        <x-slot:type>{{__('text')}}</x-slot:type>
        <x-slot:known>{{__('username')}}</x-slot:known>
        <x-slot:value>{{old('username')}}</x-slot:value>
        <x-slot:placeholder>{{__('Username or Email Auth')}}</x-slot:placeholder>
    </x-form.input_req>

    <x-form.input_req>
        <x-slot:type>{{__('password')}}</x-slot:type>
        <x-slot:known>{{__('password')}}</x-slot:known>
        <x-slot:value>{{old('password')}}</x-slot:value>
        <x-slot:placeholder>{{__('Password Auth')}}</x-slot:placeholder>
    </x-form.input_req>

    <div class="text-start">
        <a class="text-decoration-none" href="{{route('pass.forget')}}">{{__('Forget Password')}}</a>
    </div>

    <div class="text-end mb-0">
        <button class="btn bg-gradient-dark text-light mb-0"><i class="fas fa-lock me-2"></i>{{__('Login')}}</button>
    </div>
</x-layout.auth>

