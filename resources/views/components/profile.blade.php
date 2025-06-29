<div class="profile-page">

    {{-- User Image & personal details --}}
    <div class="row row-cols-1 row-cols-lg-2 g-4 mb-3">

        {{-- User Image --}}
        <div class="col">
            <div class="user-img bg-shop-light shadow-sm py-4 px-3 rounded-3">
                <h3 class="title pb-1 mb-2 text-start">{{__('Profile Image')}}</h3>
                <div class="divider-lighter shadow-sm mb-3"></div>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img class="d-block w-50 rounded-circle border border-3 border-light shadow-sm mb-3" src="{{asset('storage/'.Auth::guard("$guard")->user()->file)}}" alt="User Image">
                    <form action="" method="post">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <input type="file" name="file" id="file" class="form-control w-75">
                            <button class="btn bg-gradient-dark text-light ms-2">{{__('Upload')}}</button>
                        </div>
                    </form>
                    <p class="text-secondary">{{__('Upload your profile image that will be shown to other customers and companies.')}}</p>
                </div>
            </div>
        </div>

        {{-- Personal Details --}}
        <div class="col">
            <div class="main-details bg-shop-light shadow-sm py-4 px-3 rounded-3">
                <h3 class="title pb-1 mb-2 text-start">{{__('Personal Details')}}</h3>
                <div class="divider-lighter shadow-sm mb-3"></div>

                {{-- Update user full name --}}
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <p class="text-secondary">{{__('Your full name will safely stored in our storage and will never shown to other people, we will be use it for mail box messages.')}}</p>
                    <div class="d-flex gap-2 align-items-baseline">
                        <div class="flex-grow-1">
                            <x-form.input_req>
                                <x-slot:placeholder>{{__('User Full Name ex:Ahmed Osman')}}</x-slot:placeholder>
                                <x-slot:value>{{Auth::guard("$guard")->user()->name}}</x-slot:value>
                                <x-slot:known>{{__('name')}}</x-slot:known>
                                <x-slot:type>{{__('text')}}</x-slot:type>
                            </x-form.input_req>
                        </div>
                        <button class="btn h-50 bg-gradient-dark text-light"><i class="fas fa-check me-2"></i>{{__('Save')}}</button>
                    </div>
                </form>


                {{-- Update user username --}}
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <p class="text-secondary">{{__('Your public username will be the way to intract with other customers and they will be able to see it, also we use it for login process.')}}</p>
                    <div class="d-flex gap-2 align-items-baseline">
                        <div class="flex-grow-1">
                            <x-form.input_req>
                                <x-slot:placeholder>{{__('Userame ex:AhmedMarket')}}</x-slot:placeholder>
                                <x-slot:value>{{Auth::guard("$guard")->user()->username}}</x-slot:value>
                                <x-slot:known>{{__('username')}}</x-slot:known>
                                <x-slot:type>{{__('text')}}</x-slot:type>
                            </x-form.input_req>
                        </div>
                        <button class="btn h-50 bg-gradient-dark text-light"><i class="fas fa-check me-2"></i>{{__('Save')}}</button>
                    </div>
                </form>

                <div class="divider-lighter shadow-sm mb-3"></div>

                {{-- User Contact Infos --}}
                <h4>{{__('Contact Informations')}}</h4>

                {{-- Primary Email --}}
                <p class="text-secondary">{{__('Your primary email it can not be changed, primary we use it for authentication purposes and account recovery.')}}</p>
                <div class="d-flex gap-2 align-items-baseline">
                    <div class="flex-grow-1">
                        <x-form.input_readonly>
                            <x-slot:placeholder>{{__('Primary Email')}}</x-slot:placeholder>
                            <x-slot:value>{{Auth::guard("$guard")->user()->email}}</x-slot:value>
                            <x-slot:known>{{__('email')}}</x-slot:known>
                            <x-slot:type>{{__('email')}}</x-slot:type>
                        </x-form.input_readonly>
                    </div>
                    <button class="btn btn-success h-50"><i class="fas fa-check me-2"></i>{{__('Verify')}}</button>
                </div>

                {{-- Secondary Email --}}
                <p class="text-secondary">{{__('Your backup email it can be changed any time you want, we use it for account recovery.')}}</p>
                <div class="d-flex gap-2 align-items-baseline">
                    <div class="flex-grow-1">
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Backup Email ex: test@gmail.com')}}</x-slot:placeholder>
                            <x-slot:value>{{old('email2')}}</x-slot:value>
                            <x-slot:known>{{__('email2')}}</x-slot:known>
                            <x-slot:type>{{__('email')}}</x-slot:type>
                        </x-form.input_req>
                    </div>
                    <button class="btn btn-success h-50"><i class="fas fa-check me-2"></i>{{__('Verify')}}</button>
                    <button class="btn h-50 bg-gradient-dark text-light"><i class="fas fa-check me-2"></i>{{__('Save')}}</button>
                </div>

            </div>
        </div>

        {{-- User Addresses & Secuirty --}}
        {{-- User Addresses --}}
        <div class="col">
            <div class="bg-shop-light shadow-sm py-4 px-3 rounded-3">
                <h3 class="title pb-1 mb-2 text-start">{{__('Sihpping Addresses')}}</h3>
                <div class="divider-lighter shadow-sm mb-3"></div>
                
                {{-- Sihpping Addresses --}}
                <form action="" method="post">
                    @csrf
                    @method('PUT')

                    <p class="text-secondary">{{__('These informations will help us to deliver your orders to your home address from any where in the glob, so be specific when filling them.')}}</p>
                    {{-- Address lines --}}
                    <div class="row row-cols-1 row-cols-lg-2 g-2">
                        {{-- Address Line 1 --}}
                        <div class="col">
                            <x-form.input_req>
                                <x-slot:placeholder>{{__('Address Line 1 ex: kingswood road')}}</x-slot:placeholder>
                                <x-slot:value>{{Auth::guard("$guard")->user()->UserAddress[0]->address_line1 ?? ''}}</x-slot:value>
                                <x-slot:known>{{__('address_line1')}}</x-slot:known>
                                <x-slot:type>{{__('text')}}</x-slot:type>
                            </x-form.input_req>
                        </div>
                        {{-- Address Line 2 --}}
                        <div class="col">
                            <x-form.input_req>
                                <x-slot:placeholder>{{__('Address Line 2 ex: flat 2 wood road')}}</x-slot:placeholder>
                                <x-slot:value>{{Auth::guard("$guard")->user()->UserAddress[0]->address_line2 ?? ''}}</x-slot:value>
                                <x-slot:known>{{__('address_line2')}}</x-slot:known>
                                <x-slot:type>{{__('text')}}</x-slot:type>
                            </x-form.input_req>
                        </div>
                    </div>

                    {{-- Country & City --}}
                    <div class="row row-cols-1 row-cols-lg-2 g-2">
                        {{-- Countries --}}
                        <div class="col">
                            <x-form.select>
                                <x-slot:known>{{__('country')}}</x-slot:known>
                                <x-slot:placeholder>{{__('Select Country')}}</x-slot:placeholder>
                                <option value=""></option>
                            </x-form.select>
                        </div>
                        {{-- Cities --}}
                        <div class="col">
                            <x-form.select>
                                <x-slot:known>{{__('city')}}</x-slot:known>
                                <x-slot:placeholder>{{__('Select City')}}</x-slot:placeholder>
                                <option value=""></option>
                            </x-form.select>
                        </div>
                    </div>

                    {{-- State & Postal Code --}}
                    <div class="row row-cols-1 row-cols-lg-2 g-2">
                        {{-- states --}}
                        <div class="col">
                            <x-form.select>
                                <x-slot:known>{{__('state')}}</x-slot:known>
                                <x-slot:placeholder>{{__('Select State')}}</x-slot:placeholder>
                                <option value=""></option>
                            </x-form.select>
                        </div>
                        {{-- Postal codes --}}
                        <div class="col">
                            <x-form.select>
                                <x-slot:known>{{__('postal_code')}}</x-slot:known>
                                <x-slot:placeholder>{{__('Select Postal Code')}}</x-slot:placeholder>
                                <option value=""></option>
                            </x-form.select>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn h-50 bg-gradient-dark text-light"><i class="fas fa-check me-2"></i>{{__('Save')}}</button>
                    </div>

                </form>

            </div>
        </div>

        {{-- Secuirty --}}
        <div class="col">
            <div class="main-details bg-shop-light shadow-sm py-4 px-3 rounded-3">
                <h3 class="title pb-1 mb-2 text-start">{{__('Security and Authentication')}}</h3>
                <div class="divider-lighter shadow-sm mb-3"></div>

                {{-- Update user password --}}
                <p class="text-secondary">{{__('Your password will be high secured and encrypted, so make sure that you always select complex one to increase the security level.')}}</p>
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-2 align-items-baseline">
                        <div class="flex-grow-1">
                            <x-form.input_req>
                                <x-slot:placeholder>{{__('Account Password ex: T@tRyE9_009WeWr')}}</x-slot:placeholder>
                                <x-slot:value>{{old('password')}}</x-slot:value>
                                <x-slot:known>{{__('password')}}</x-slot:known>
                                <x-slot:type>{{__('password')}}</x-slot:type>
                            </x-form.input_req>
                        </div>
                        <button class="btn btn-success h-50"><i class="fas fa-gear me-2"></i>{{__('Genarate')}}</button>
                        <button class="btn h-50 bg-gradient-dark text-light"><i class="fas fa-check me-2"></i>{{__('Save')}}</button>
                    </div>
                </form>

                <div class="divider-lighter shadow-sm mb-3"></div>

                {{-- Telephone --}}
                <p class="text-secondary">{{__('Your phone number it can be changed any time you want, we use it for account recovery.')}}</p>
                <div class="d-flex gap-2 align-items-baseline">
                    <div class="flex-grow-1">
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Telephone Number')}}</x-slot:placeholder>
                            <x-slot:value>{{old('phone')}}</x-slot:value>
                            <x-slot:known>{{__('phone')}}</x-slot:known>
                            <x-slot:type>{{__('text')}}</x-slot:type>
                        </x-form.input_req>
                    </div>
                    <button class="btn btn-success h-50"><i class="fas fa-check me-2"></i>{{__('Verify')}}</button>
                    <button class="btn h-50 bg-gradient-dark text-light"><i class="fas fa-check me-2"></i>{{__('Save')}}</button>
                </div>

            </div>
        </div>

    </div>

</div>