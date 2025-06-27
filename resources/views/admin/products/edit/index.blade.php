<x-layout.panel>
    <x-slot:title>{{ __('Managing Products') }}</x-slot:title>
    <x-slot:pagename>{{ __('Products') }}</x-slot:pagename>

    <section class="products">

        <div class="row row-cols-1 row-cols-md-2 g-3">

            {{-- Adding New Product Form --}}
            <div class="col">

                <x-card.header_body>

                    <x-slot:title>{{__('Editing Products')}}</x-slot:title>

                    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        
                        @csrf

                        @method('PUT')

                        {{-- Product Name & Category --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2">
                            {{-- Product Name --}}
                            <div class="col">
                                <x-form.input>
                                    <x-slot:known>{{'name'}}</x-slot:known>
                                    <x-slot:type>{{__('text')}}</x-slot:type>
                                    <x-slot:value>{{$product->name}}</x-slot:value>
                                    <x-slot:placeholder>{{__('Product Name')}}</x-slot:placeholder>
                                </x-form.input>
                            </div>
                            {{-- Product Quantity --}}
                            <div class="col">
                                <x-form.select>
                                    <x-slot:known>{{__('cate_id')}}</x-slot:known>
                                    <x-slot:placeholder>{{__('Select Product Category')}}</x-slot:placeholder>
                                    @foreach ($cates as $cate)
                                        <option @if($product->Category->name == $cate->name) selected @endif value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </x-form.select>
                            </div>
                        </div>

                        {{-- Product Quantity And Price --}}
                        <div class="row row-cols-1 row-cols-lg-2 g-2">
                            {{-- Product Quantity --}}
                            <div class="col">
                                <x-form.input>
                                    <x-slot:type>{{__('number')}}</x-slot:type>
                                    <x-slot:known>{{__('stock_quant')}}</x-slot:known>
                                    <x-slot:value>{{$product->stock_quant}}</x-slot:value>
                                    <x-slot:placeholder>{{__('Product Quantity')}}</x-slot:placeholder>
                                </x-form.input>
                            </div>
                            {{-- Product Price --}}
                            <div class="col">
                                <x-form.input>
                                    <x-slot:type>{{__('number')}}</x-slot:type>
                                    <x-slot:known>{{__('price')}}</x-slot:known>
                                    <x-slot:value>{{$product->price}}</x-slot:value>
                                    <x-slot:placeholder>{{__('Product Price')}}</x-slot:placeholder>
                                </x-form.input>
                            </div>

                        </div>

                        {{-- Product Image --}}
                        <x-form.file>
                            <x-slot:accept>{{__('image/*')}}</x-slot:accept>
                        </x-form.file>

                        {{-- Product Description --}}
                        <div class="form-floating mb-3">
                            <textarea name="description" id="desc" class="form-control" data-value="{{$product->description}}" placeholder="Describe Your Product"></textarea>
                            <label for="desc">{{__('Describe Your Product')}}</label>
                        </div>

                        {{-- Saving Button --}}
                        <div class="text-end">
                            <a href="{{route('products')}}" class="btn btn-danger"><i class="fas fa-times me-2"></i>{{__('Cancel')}}</a>
                            <button class="btn bg-gradient-dark text-light"><i class="fas fa-edit me-2"></i>{{__('Update')}}</button>
                        </div>

                    </form>

                </x-card.header_body>

            </div>

        </div>

    </section>

</x-layout.panel>