<x-layout.main>
    <x-slot:title>{{ __('Managing Products') }}</x-slot:title>
    <x-slot:pagename>{{ __('Products') }}</x-slot:pagename>

    <section class="members">

        <div class="row row-cols-1 row-cols-md-2 mb-4">

            <div class="col mb-3 mb-md-0 text-start">
                <a href="{{ route('products.add') }}" class="btn bg-gradient-dark text-white">
                    <i class="fas fa-plus me-2"></i>
                    {{__('Product')}}
                </a>
            </div>

            <div class="col text-center text-md-end">

                <label class="me-2" for="filterProduct">{{__('Filter Table')}}</label>
                <div class="d-inline-block w-auto me-2">
                    <x-form.select>
                        <x-slot:known>{{__('filterProduct')}}</x-slot:known>
                        <x-slot:placeholder>{{__('Categories')}}</x-slot:placeholder>
                        <option value="All" selected>{{__('All')}}</option>
                        @foreach ($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </x-form.select>
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
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('Price')}}</th>
                        <th scope="col">{{__('Quant')}}</th>
                        <th scope="col">{{__('Description')}}</th>
                        <th scope="col">{{__('Created')}}</th>
                        <th scope="col">{{__('Last Update')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody class="algin-items-center">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    <a 
                                        href="#"
                                        id="open{{$product->file}}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#showImg"
                                        data-src="{{asset('storage/'.$product->file)}}"
                                    >
                                        <img class="table-img img-center" src="{{asset('storage/'.$product->file)}}" alt="UserImage">
                                    </a>
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->Category->name}}</td>
                                <td>{{'$'.$product->price}}</td>
                                <td>{{$product->stock_quant}}</td>
                                @if ($product->description != '')
                                    <td>
                                        <a 
                                            href="#"
                                            id="desc{{$product->name}}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#showDesc"
                                            data-desc="{{$product->description}}"
                                        >
                                            <i class="fas fa-eye fs-4 text-main"></i>
                                        </a>
                                    </td>
                                @else
                                    <td>{{''}}</td>
                                @endif
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>{{$product->updated_at->diffForHumans()}}</td>
                                {{-- <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($product->updated_at))->diffForHumans()}}</td> --}}
                                <td>
                                    <a href="{{route('products.edit', $product->id)}}" title="Edit" class="btn text-white bg-gradient-dark btn-sm"><i class="fas fa-edit"></i></a>
                                    <a 
                                        href="#" 
                                        title="Delete" 
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteCate"
                                        data-route="{{route('products.destroy', $product->id)}}"
                                    >
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">{{__('No Products Added Yet')}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </section>

</x-layout.main>