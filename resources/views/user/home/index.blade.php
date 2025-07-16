<x-layout.main>
    <x-slot:title>{{ 'Welcome To Our Big Store Market' }}</x-slot:title>
    
    {{-- The three row icons --}}
    <x-body.section>
        <x-slot:class>{{'cates bg-white shadow-sm py-3'}}</x-slot:class>
        <x-slot:sec_title>{{__('')}}</x-slot:sec_title>
        
        <div class="row row-cols-3 g-3 text-center">
            <div class="col">
                <i class="fas fa-mobile-screen-button fa-3x mb-3 text-lara-dark"></i>
                <h5>Electronics</h5>
            </div>
            <div class="col">
                <i class="fas fa-t-shirt fa-3x mb-3 text-lara-dark"></i>
                <h5>Fashion</h5>
            </div>
            <div class="col">
                <i class="fas fa-chair fa-3x mb-3 text-lara-dark"></i>
                <h5>Home Decor</h5>
            </div>
        </div>
        
    </x-body.section>
    
    {{-- Top Deals LaraShop Products --}}
    <x-body.section>
        <x-slot:class>{{'products py-5'}}</x-slot:class>
        <x-slot:sec_title>{{__('Top Deals')}}</x-slot:sec_title>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-3">

            @for ($i = 0; $i < 4; $i++)

                <div class="col">
                    <x-card.normal>
                        <a href="#" class="text-decoration-none"><h5>Galaxy S24s Ultra</h5></a>
                        <p>$1500</p>
                        <div class="text-end">
                            <i title="Add To Wishlist" class="fas fa-heart text-danger me-3"></i>
                            <i title="Add To Cart" class="fas fa-cart-shopping text-lara-dark"></i>
                        </div>
                    </x-card.normal>
                </div>
                
            @endfor

        </div>

    </x-body.section>
    
    {{-- Latest LaraShop Products --}}
    <x-body.section>
        <x-slot:class>{{'products py-5'}}</x-slot:class>
        <x-slot:sec_title>{{__('Latest Products')}}</x-slot:sec_title>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-3">

            @for ($i = 0; $i < 4; $i++)

                <div class="col">
                    <x-card.normal>
                        <a href="#" class="text-decoration-none"><h5>Galaxy S24s Ultra</h5></a>
                        <p>$1500</p>
                        <div class="text-end">
                            <i title="Add To Wishlist" class="fas fa-heart text-danger me-3"></i>
                            <i title="Add To Cart" class="fas fa-cart-shopping text-lara-dark"></i>
                        </div>
                    </x-card.normal>
                </div>
                
            @endfor

        </div>

    </x-body.section>
    
    {{-- Contact LaraShop --}}
    <x-body.section>
        <x-slot:class>{{'contact py-5'}}</x-slot:class>
        <x-slot:sec_title>{{__('Contact Us')}}</x-slot:sec_title>
        three
    </x-body.section>
    
</x-layout.main>