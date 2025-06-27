<x-layout.panel>
    <x-slot:title>{{ __('Managing Members') }}</x-slot:title>
    <x-slot:pagename>{{ __('Members') }}</x-slot:pagename>

    <section class="members">

        <div class="row row-cols-1 row-cols-md-2 mb-4">

            <div class="col mb-3 mb-md-0 text-start">
                <a href="{{ route('members.add') }}" class="btn bg-gradient-dark text-white">
                    <i class="fas fa-plus me-2"></i>
                    {{__('Member')}}
                </a>
            </div>

            <div class="col text-center text-md-end">

                <label class="me-2" for="filtered-users">{{__('Filter Table')}}</label>
                <div class="d-inline-block me-2">
                    <select name="" id="filtered-users" class="form-select" placeholder="Users Approvement">
                        <option value="All" selected>{{__('All')}}</option>
                        <option value="Approved">{{__('Approved')}}</option>
                        <option value="Not Approved">{{__('Not Approved')}}</option>
                    </select>
                </div>
                
                <label class="me-2" for="show-users">{{__('Show')}}</label>
                <div class="d-inline-block">
                    <select name="" id="show-users" class="form-select" placeholder="Users Approvement">
                        <option value="25" selected>{{__('25')}}</option>
                        <option value="50">{{__('50')}}</option>
                        <option value="100">{{__('100')}}</option>
                    </select>
                </div>

                <i title="Search for specific user" class="fas fa-search ms-3"></i>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-striped shadow-sm text-center">
                <thead class="bg-gradient-dark">
                    <tr>
                        <th scope="col">{{__('ID')}}</th>
                        <th scope="col">{{__('Image')}}</th>
                        <th scope="col">{{__('Username')}}</th>
                        <th scope="col">{{__('Full Name')}}</th>
                        <th scope="col">{{__('Email')}}</th>
                        <th scope="col">{{__('Role')}}</th>
                        <th scope="col">{{__('Created')}}</th>
                        <th scope="col">{{__('Last Update')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <img 
                                        class="table-img rounded-4 shadow-sm border border-light img-center" 
                                        src="{{asset('storage/'.$user->file)}}" 
                                        alt="UserImage"
                                    >
                                </td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->group_id == 1 ? 'Admin' : 'Customer'}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="d-flex">
                                        
                                        <a href="{{route('members.edit', $user->id)}}" title="Edit" class="btn text-white bg-gradient-dark btn-sm me-1"><i class="fas fa-edit"></i></a>
                                    
                                        <a 
                                            href="#" 
                                            title="Delete" 
                                            class="btn btn-danger btn-sm mt-1 mt-md-0 me-1"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteCate"
                                            data-route="{{route('members.destroy', $user->id)}}"
                                        >
                                            <i class="fas fa-times"></i>
                                        </a>
    
                                        @if ($user->approvent == 0)
                                            <form action="{{route('members.approve', $user->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button title="Approve" class="btn btn-success mt-1 mt-md-0 btn-sm"><i class="fas fa-check"></i></button>
                                            </form>
                                        @endif

                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">{{__('No Members Added Yet')}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </section>

</x-layout.panel>