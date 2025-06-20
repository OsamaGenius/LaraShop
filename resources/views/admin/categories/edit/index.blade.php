<x-layout.main>
    <x-slot:title>{{__('Managing Categories')}}</x-slot:title>
    <x-slot:pagename>{{__('Categories')}}</x-slot:pagename>

    <section class="categories">

        <div class="row row-cols-1 row-cols-md-2 g-3">

            {{-- Adding New Category Form --}}
            <div class="col">

                <x-card.header_body>

                    <x-slot:title>{{__('Adding New Categories')}}</x-slot:title>

                    <form action="{{route('categories.update', $category->id)}}" method="POST">
                        
                        @csrf

                        @method('PUT')

                        {{-- Category ID --}}
                        <x-form.input_req>
                            <x-slot:known>{{'id'}}</x-slot:known>
                            <x-slot:type>{{__('hidden')}}</x-slot:type>
                            <x-slot:value>{{$category->id}}</x-slot:value>
                            <x-slot:placeholder>{{__('Category ID')}}</x-slot:placeholder>
                        </x-form.input_req>

                        {{-- Category Name --}}
                        <x-form.input_req>
                            <x-slot:known>{{'name'}}</x-slot:known>
                            <x-slot:type>{{__('text')}}</x-slot:type>
                            <x-slot:value>{{$category->name}}</x-slot:value>
                            <x-slot:placeholder>{{__('Category Name')}}</x-slot:placeholder>
                        </x-form.input_req>

                        {{-- Category Description --}}
                        <div class="form-floating mb-3">
                            <textarea name="description" id="desc" class="form-control" data-value="{{$category->description}}" placeholder="Describe Your Category"></textarea>
                            <label for="desc">{{__('Describe Your Category')}}</label>
                        </div>

                        {{-- Saving Button --}}
                        <div class="text-end">
                            <a href="{{route('categories')}}" class="btn text-bg-danger ms-3"><i class="fas fa-times me-2"></i>{{__('Cancel')}}</a>
                            <button class="btn bg-gradient-dark text-light"><i class="fas fa-edit me-2"></i>{{__('Update')}}</button>
                        </div>

                    </form>

                </x-card.header_body>

            </div>

        </div>

    </section>

</x-layout.main>