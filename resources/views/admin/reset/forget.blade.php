<x-layout.auth>
    <x-slot:method>{{'POST'}}</x-slot:method>
    <x-slot:route>{{route('admin.pass.forget.exec')}}</x-slot:route>
    <x-slot:pagename>{{__('Forget LaraShop Account Password')}}</x-slot:pagename>
    <x-slot:title>{{__('Write your email account to send verifiction code.')}}</x-slot:title>

    <x-form.input_req>
        <x-slot:type>{{__('email')}}</x-slot:type>
        <x-slot:known>{{__('email')}}</x-slot:known>
        <x-slot:value>{{old('email')}}</x-slot:value>
        <x-slot:placeholder>{{__('Enter Email Account')}}</x-slot:placeholder>
    </x-form.input_req>

    <div class="text-end mb-0">
        <a href="{{route('admin.login')}}" class="btn btn-success mb-0 me-2"><i class="fas fa-times me-2"></i>{{__('Cancel')}}</a>
        <button class="btn bg-gradient-dark text-light mb-0"><i class="fas fa-location-arrow me-2"></i>{{__('Send')}}</button>
    </div>

</x-layout.auth>

