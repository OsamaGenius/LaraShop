<x-layout.main>
    <x-slot:title>{{ __('Adding New Members') }}</x-slot:title>
    <x-slot:pagename>{{ __('Members') }}</x-slot:pagename>

    <section class="members">

        <div class="row row-cols-1 row-cols-md-2 g-2 g-md-3 g-xl-4">

            {{-- Adding Form --}}
            <div class="col">

                <x-card.header_body>

                    <x-slot:title>{{__('Adding Members Form')}}</x-slot:title>

                    <form action="{{route('members.store')}}" method="POST">
                        
                        @csrf

                        {{-- First Name & Last Name Fields --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2 mb-3">

                            <div class="col">
                                <x-form.input_req>
                                    <x-slot:placeholder>{{__('First Name ex:Ahmed')}}</x-slot:placeholder>
                                    <x-slot:value>{{old('firstName')}}</x-slot:value>
                                    <x-slot:known>{{__('firstName')}}</x-slot:known>
                                    <x-slot:type>{{__('text')}}</x-slot:type>
                                </x-form.input_req>
                            </div>

                            <div class="col">
                                <x-form.input_req>
                                    <x-slot:placeholder>{{__('Last Name ex:Mohammed')}}</x-slot:placeholder>
                                    <x-slot:value>{{old('lastName')}}</x-slot:value>
                                    <x-slot:known>{{__('lastName')}}</x-slot:known>
                                    <x-slot:type>{{__('text')}}</x-slot:type>
                                </x-form.input_req>
                            </div>

                        </div>

                        {{-- User Email --}}
                        <x-form.input_req>
                            <x-slot:placeholder>{{__('Email ex:user207@gmail.com')}}</x-slot:placeholder>
                            <x-slot:value>{{old('email')}}</x-slot:value>
                            <x-slot:known>{{__('email')}}</x-slot:known>
                            <x-slot:type>{{__('email')}}</x-slot:type>
                        </x-form.input_req>

                        {{-- GroupID & Status Fields --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2 mb-3">

                            <div class="col">
                                <x-form.select>
                                    <x-slot:known>{{__('group_id')}}</x-slot:known>
                                    <x-slot:placeholder>{{__('An admin user or customer')}}</x-slot:placeholder>
                                    <option value="0">{{__('Customer User')}}</option>
                                    <option value="1">{{__('Admin User')}}</option>
                                </x-form.select>
                            </div>

                            <div class="col">
                                <x-form.select>
                                    <x-slot:known>{{__('approvent')}}</x-slot:known>
                                    <x-slot:placeholder>{{__('Needs Approvent')}}</x-slot:placeholder>
                                    <option value="0">{{__('Not Approved')}}</option>
                                    <option value="1">{{__('Approved')}}</option>
                                </x-form.select>
                            </div>

                        </div>

                        {{-- Password Fields --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2 mb-3">

                            <div class="col">
                                <x-form.input_req>
                                    <x-slot:placeholder>{{__('Password: Should be strong')}}</x-slot:placeholder>
                                    <x-slot:value>{{old('password')}}</x-slot:value>
                                    <x-slot:known>{{__('password')}}</x-slot:known>
                                    <x-slot:type>{{__('password')}}</x-slot:type>
                                </x-form.input_req>
                            </div>

                            <div class="col">
                                <div class="text-start">
                                    <button class="btn bg-gradient-dark text-light mt-3">{{__('Suggest Strong Password')}}</button>
                                </div>
                            </div>

                        </div>
                        
                        {{-- Saving Button --}}
                        <div class="text-end">
                            <button class="btn bg-gradient-dark text-light"><i class="fas fa-user-plus me-2"></i>{{__('Create')}}</button>
                        </div>

                    </form>

                </x-card.header_body>

            </div>

            {{-- Statistics --}}
            <div class="col">
                
                <div class="row row-cols-1 g-3">
                    {{-- Needs Approve --}}
                    <div class="col">
                        <x-card.header_body>
                            <x-slot:title>{{__('Latest 5 Members To Approve')}}</x-slot:title>
                            @if (count($approvent) > 0)
                                <div class="row row-cols-4 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3">
                                    @foreach ($approvent as $approve)
                                        <div class="col">
                                            <img 
                                                class="mb-2 table-img rounded-4 border border-white shadow-sm" 
                                                src="{{asset('storage/'.$approve->file)}}" 
                                                alt="userImage"
                                            >
                                            <h5 class="mb-2">{{$approve->username == '' ? $approve->name : $approve->username}}</h5>
                                            <a href="#" class="btn bg-gradient-dark text-white">{{__('Approve')}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-primary">{{__('There is no users needs approvent')}}</div>
                            @endif
                        </x-card.header_body>
                    </div>
                    
                    {{-- Latest Updated --}}
                    <div class="col">
                        <x-card.header_body>
                            <x-slot:title>{{__('Latest 5 Updating Members')}}</x-slot:title>
                            @if (count($updated) > 0)
                                <div class="row row-cols-4 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3">
                                    @foreach ($updated as $update)
                                        <div class="col">
                                            <img 
                                                class="mb-2 table-img rounded-4 border border-white shadow-sm" 
                                                src="{{asset('storage/'.$update->file)}}" 
                                                alt="userImage"
                                            >
                                            <h5 class="mb-2">{{__($update->username != '' ? $update->username : $update->name)}}</h5>
                                            <p>{{__($update->updated_at->diffForHumans())}}</p>
                                            <a href="#" class="btn bg-gradient-dark text-white">{{__('Edit')}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-primary">{{__('There is no users make changes to thier profiles.')}}</div>
                            @endif
                        </x-card.header_body>
                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layout.main>