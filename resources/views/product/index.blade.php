<x-app-layout>
    <x-slot:header>
        All Products
        @if (@isset($category))
             of Category: {{ $category->name }}
        @endif
        @if (@isset($material))
        of Material: {{ $material->name }}
        @endif

    </x-slot:header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-3 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="">
                    
              
                    <livewire:sort-by :categories="$categories" />
                
                </div>
                <div class="flex flex-col md:flex-row flex-wrap justify-center">
                    @foreach ($products as $product)
                    
                     <x-product-card :product="$product" />                 
                       
                    @endforeach 
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>