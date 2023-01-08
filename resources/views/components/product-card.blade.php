@props(['pid', 'price'])
<div class="sm:w-3/12 bg-gray-200 rounded-lg p-3 m-2 text-center">
    <img 
    class="w-11/12 mx-auto m-2 rounded-md" 
    src="https://cdn.shopify.com/s/files/1/0671/0621/products/3213265_eea73e75-519c-46a5-a488-6fd8c81efe9b_360x.jpg?v=1665568643" 
    />   

    <a href="{{ route('products.show',$pid) }}" class="text-lg text-blue-600">
      {{ $name }}
    </a>
    <div class="text-md">
      Rs {{$price}}
    </div>
    <div class="flex flex-col md:flex-row justify-center text-center font-semibold ">
      <livewire:add-to-cart :product_id="$pid" class="mb-2"/>
      
      <a href="{{ route('products.show',$pid) }} " class="w-max inline-flex mx-auto items-center px-4 py-2 border border-transparent rounded-md  text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-amber-500 ml-2 mb-2">
        Shop
      </a>

    </div>
  </div>  
