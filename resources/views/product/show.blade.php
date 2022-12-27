<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if ($message = Session::get('message'))
                    <div class="text-green-800" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
                        <p class="w-full text-center">{{ $message }}</p>
                    </div>
                @endif             
               
                <div class="flex flex-col sm:flex-row">
                    
                    {{-- flex item image --}}
                    <div class="sm:m-2 sm:w-1/2 w-full mx-auto">
                        <img src="https://cdn.shopify.com/s/files/1/0671/0621/products/sdfhht_800x.jpg?v=1651310074" alt="" class="w-full rounded-md">
                    </div>
                    {{-- flex item and data flex--}}
                    <div class="flex flex-col sm:justify-start sm:ml-2 mx-auto w-full">
                        {{-- inner flex item discount--}}
                        <div class="flex flex-row justify-between">
                            
                            @if ($product->discounted)
    
                            <div class="w-max bg-yellow-600 text-white p-2 mx-auto my-2 sm:ml-2">
                                Save {{ round($product->discount/($product->price)*100) }} %
                            </div>                            
                            
                            @endif
                            @can(['update', 'delete'], $product)
                            <div>
                                <a href="/products/{{$product->id}}/edit"> Edit </a>
                                <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-jet-button class="">
                                        Delete
                                    </x-jet-button>
                                </form>

                            </div>                                
                            @endcan

                        </div>
                        {{-- inner flex item sale--}}
                        <div>
                            <img class="w-16 mx-auto my-2 sm:ml-2" src="https://cdn.shopify.com/s/files/1/0671/0621/files/sale_new_op.png?v=1617442724" alt="">
                        </div>
                        {{-- inner flex item title --}}
                        <div class="border-b-2 border-b-slate-700 pb-3">
                            <h1 class="sm:text-3xl text-2xl text-center sm:text-left font-semibold">
                                {{$product->name}}  
                            </h1>
                        </div>
                        {{-- inner flex item and flex --}}
                        <div class="flex flex-row justify-between text-sm">
                            {{--2nd inner flex item rating stars --}}
                                <ul class="flex flex-row my-2 justify-start flex-wrap">
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-amber-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-amber-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-amber-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-amber-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-regular fa-star"></i></a></li>
                                    <li class="ml-1">120 Reveiws</li>
                                </ul>                            
                            {{-- 2nd inner flex item feedbacks --}}
                            <div class="my-2 text-center sm:text-left">
                                <a href="#">
                                    <i class="fa-solid fa-message"></i>
                                20 Feedbacks
                                </a>                                
                            </div>                            
                        </div>
                        {{-- inner flex item price --}}
                        <div class="font-semibold text-xl text-center">
                            <span class="">
                                @if ($product->discounted)
                                    {{ $product->price - $product->discount }}
                                @else
                                {{$product->price}}
                                @endif
                                
                            </span>
                            <span class="text-amber-300 line-through">
                                Rs {{ $product->price }}                                
                            </span>
                        </div>
                        {{-- inner flex item --}}
                        <div >
                            Color: Black
                        </div>
                        {{-- inner flex item --}}
                        <ul class="flex flex-row">
                            <li class="rounded-full w-8 h-8 bg-black border-2 mr-1 my-1"></li>
                            <li class="rounded-full w-8 h-8 bg-blue-900 border-2 mr-1 my-1"></li>
                            <li class="rounded-full w-8 h-8 bg-red-700 border-2 mr-1 my-1"></li>
                            <li class="rounded-full w-8 h-8 bg-green-800 border-2 mr-1 my-1"></li>
                        </ul>
                        {{-- inner flex item and flex --}}
                        <div class="flex flex-row justify-center">
                            <livewire:counter />
                            <livewire:add-to-cart :product_id="$product->id" />
                            <x-jet-button class="bg-amber-500 ml-3">
                                Shop Now
                            </x-jet-button>                            
                        </div>
                        {{-- inner flex item --}}
                        <div class="block text-left mt-3">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>