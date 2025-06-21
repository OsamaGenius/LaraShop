<x-layout.auth>
    <x-slot:title>{{__('Enter your new password, make sure to make it strong.')}}</x-slot:title>
    <x-slot:route>{{''}}</x-slot:route>
    <x-slot:pagename>{{__('Forget LaraShop Account Password')}}</x-slot:pagename>

    <x-form.input_req>
        <x-slot:type>{{__('password')}}</x-slot:type>
        <x-slot:known>{{__('password')}}</x-slot:known>
        <x-slot:value>{{old('password')}}</x-slot:value>
        <x-slot:placeholder>{{__('Enter New Password')}}</x-slot:placeholder>
    </x-form.input_req>

    <x-form.input_req>
        <x-slot:type>{{__('password')}}</x-slot:type>
        <x-slot:known>{{__('new_password')}}</x-slot:known>
        <x-slot:value>{{old('new_password')}}</x-slot:value>
        <x-slot:placeholder>{{__('Confirm New Password')}}</x-slot:placeholder>
    </x-form.input_req>

    <div class="text-end mb-0">
        <button class="btn bg-gradient-dark text-light mb-0"><i class="fas fa-edit me-2"></i>{{__('Update')}}</button>
    </div>

</x-layout.auth>

