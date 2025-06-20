<x-layout.main>
    <x-slot:title>{{ __('Managing Categories') }}</x-slot:title>
    <x-slot:pagename>{{ __('Categories') }}</x-slot:pagename>

    <section class="members">

        <div class="row row-cols-2 mb-4">

            <div class="col mb-3 mb-md-0 text-start">
                <a href="{{ route('categories.add') }}" class="btn bg-gradient-dark text-white">
                    <i class="fas fa-plus me-2"></i>
                    {{__('category')}}
                </a>
            </div>

            <div class="col text-end">

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
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Description')}}</th>
                        <th scope="col">{{__('Created')}}</th>
                        <th scope="col">{{__('Last Update')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                @if ($category->description != '')
                                    <td>
                                        <a 
                                            href="#"
                                            id="desc{{$category->name}}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#showDesc"
                                            data-desc="{{$category->description}}"
                                        >
                                            <i class="fas fa-eye fs-4 text-main"></i>
                                        </a>
                                    </td>
                                @else
                                    <td>{{''}}</td>
                                @endif
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>{{$category->updated_at->diffForHumans()}}</td>
                                {{-- <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($category->updated_at))->diffForHumans()}}</td> --}}
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" title="Edit" class="btn text-white bg-gradient-dark btn-sm"><i class="fas fa-edit"></i></a>
                                    <a 
                                        href="#" 
                                        title="Delete" 
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteCate"
                                        data-route="{{route('categories.destroy', $category->id)}}"
                                    >
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">{{__('No Categories Added Yet')}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </section>

</x-layout.main>