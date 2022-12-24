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
    <a href="{{ route('products.show',$pid) }} " class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-amber-500 text-lg h-8 m-2 sm:m-0">
      Shop
    </a>
  </div>  
