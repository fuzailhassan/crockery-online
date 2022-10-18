<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="container mx-auto">
                    <div class="mx-auto text-center text-2xl font-semibold">
                        New Arrival
                    </div>
                </div>
                {{-- Featured producrts--}}
                <div class="flex flex-col text-center justify-items-center sm:justify-center sm:flex-row">
                    @for ($i = 0; $i < 5; $i++)
                    <x-product-card/>                        
                    @endfor
                </div>
                    {{-- Featured products end --}}
                    <div class="mx-auto text-center text-2xl font-semibold my-2">
                        Featured Product
                    </div>
                        {{-- Single Featured Product --}}
                {{-- main flex --}}
                <div class="flex flex-col sm:flex-row">
                    {{-- flex item image --}}
                    <div class="sm:m-2 sm:w-1/2 w-full mx-auto">
                        <img src="https://cdn.shopify.com/s/files/1/0671/0621/products/sdfhht_800x.jpg?v=1651310074" alt="" class="w-full rounded-md">
                    </div>
                    {{-- flex item and data flex--}}
                    <div class="flex flex-col sm:justify-start sm:ml-2 mx-auto">
                        {{-- inner flex item discount--}}
                        <div class="w-max bg-yellow-600 text-white p-2 mx-auto my-2 sm:ml-2">
                            Save 24 %
                        </div>
                        {{-- inner flex item sale--}}
                        <div>
                            <img class="w-16 mx-auto my-2 sm:ml-2" src="https://cdn.shopify.com/s/files/1/0671/0621/files/sale_new_op.png?v=1617442724" alt="">
                        </div>
                        {{-- inner flex item title --}}
                        <div class="border-b-2 border-b-slate-700 pb-3">
                            <h1 class="sm:text-3xl text-2xl text-center sm:text-left font-semibold">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas  
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
                                Rs 1,600
                            </span>
                            <span class="text-amber-300 line-through">
                                Rs 1810
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
                            <x-jet-button class="bg-amber-500">
                                Shop Now
                            </x-jet-button>                            
                        </div>
                    </div>
                </div>
                <ul class="flex flex-row flex-wrap justify-center text-center bg-gray-300 p-3 my-3 w-screen -mx-4">
                    <li class="w-max mr-3"><i class="fa-solid fa-gift mr-1"></i>30 Days Happiness Guarantee</li>
                    <li class="w-max mr-3"><i class="fa-solid fa-box-heart mr-1"></i>Cash on delivery</li>
                    <li class="w-max mr-3"><i class="fa-solid fa-gem mr-1"></i>Everything we sell is genuine. We don't sell fake brands</li>                    
                </ul>
        </div>
        <div class="flex flex-row">
            
        </div>
    </div>
</x-app-layout>
