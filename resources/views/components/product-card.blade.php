@props(['product'])
<div class="md:w-3/12 bg-gray-200 rounded-lg p-3 m-2 text-center flex flex-col justify-center">
    <img 
    class="w-11/12 max-h-48 mx-auto m-2 rounded-md" 
    src="{{ $product->getFirstMediaUrl() ? $product->getFirstMediaUrl() : asset('storage/placeholder.jpg') }}" 
    />   
{{-- @php
    dd($product);
@endphp --}}
    <a href="{{ route('products.show',$product) }}" class="text-lg text-blue-600">
      {{ $product->name }}
    </a>
    <div class="text-md">
      Rs {{ ($product->discounted) ? $product->price - $product->discount  : $product->price ; }}
    </div>
    <div class="flex flex-col mx-auto md:flex-row justify-center justify-items-center text-center font-semibold space-x-2">
      <livewire:add-to-cart :product_id="$product->id" class="mb-2"/>
      

      {{-- <form action="{{ route('order.create') }}" method="post"></form>
      <button href="{{ route('products.show',$product) }} " class="w-max inline-flex md:mx-auto items-center px-4 py-2 border border-transparent rounded-md  text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-indigo-500 mb-2">
        Shop
      </button> --}}

    </div>
  </div>  
