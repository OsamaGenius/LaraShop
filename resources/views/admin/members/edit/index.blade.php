<x-layout.panel>
    <x-slot:title>{{ __('Adding New Members') }}</x-slot:title>
    <x-slot:pagename>{{ __('Members') }}</x-slot:pagename>

    <section class="members">

        @php
            $name = explode(' ', $user->name);
        @endphp

        <div class="row row-cols-1 row-cols-md-2 g-2 g-md-3 g-xl-4">

            {{-- Adding Form --}}
            <div class="col">

                <x-card.header_body>

                    <x-slot:title>{{__('Adding Members Form')}}</x-slot:title>

                    <form action="{{route('members.update', $user->id)}}" method="POST">
                        
                        @csrf

                        @method('PUT')

                        {{-- First Name & Last Name Fields --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2 mb-3">

                            <div class="col">
                                <x-form.input_readonly>
                                    <x-slot:placeholder>{{__('First Name ex:Ahmed')}}</x-slot:placeholder>
                                    <x-slot:value>{{__($name[0])}}</x-slot:value>
                                    <x-slot:known>{{__('firstName')}}</x-slot:known>
                                    <x-slot:type>{{__('text')}}</x-slot:type>
                                </x-form.input_readonly>
                            </div>

                            <div class="col">
                                <x-form.input_readonly>
                                    <x-slot:placeholder>{{__('Last Name ex:Mohammed')}}</x-slot:placeholder>
                                    <x-slot:value>{{__($name[1])}}</x-slot:value>
                                    <x-slot:known>{{__('lastName')}}</x-slot:known>
                                    <x-slot:type>{{__('text')}}</x-slot:type>
                                </x-form.input_readonly>
                            </div>

                        </div>

                        {{-- User Email --}}
                        <x-form.input_readonly>
                            <x-slot:placeholder>{{__('Email ex:user207@gmail.com')}}</x-slot:placeholder>
                            <x-slot:value>{{$user->email}}</x-slot:value>
                            <x-slot:known>{{__('email')}}</x-slot:known>
                            <x-slot:type>{{__('email')}}</x-slot:type>
                        </x-form.input_readonly>

                        {{-- GroupID & Status Fields --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2 mb-3">

                            <div class="col">
                                <x-form.select>
                                    <x-slot:known>{{__('group_id')}}</x-slot:known>
                                    <x-slot:placeholder>{{__('An admin user or customer')}}</x-slot:placeholder>
                                    <option @if($user->group_id == 0) selected @endif value="0">{{__('Customer User')}}</option>
                                    <option @if($user->group_id == 1) selected @endif value="1">{{__('Admin User')}}</option>
                                </x-form.select>
                            </div>

                            <div class="col">
                                <x-form.select>
                                    <x-slot:known>{{__('approvent')}}</x-slot:known>
                                    <x-slot:placeholder>{{__('Needs Approvent')}}</x-slot:placeholder>
                                    <option @if($user->approvent == 0) selected @endif value="0">{{__('Not Approved')}}</option>
                                    <option @if($user->approvent == 1) selected @endif value="1">{{__('Approved')}}</option>
                                </x-form.select>
                            </div>

                        </div>

                        {{-- Saving Button --}}
                        <div class="text-end">
                            <a href="{{route('members')}}" class="btn btn-danger"><i class="fas fa-times me-2"></i>{{__('Cancel')}}</a>
                            <button class="btn bg-gradient-dark text-light"><i class="fas fa-user-edit me-2"></i>{{__('Update')}}</button>
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

</x-layout.panel>