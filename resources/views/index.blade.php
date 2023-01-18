<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto md:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg p-4">
                <div class="container mx-auto">
                    <div class="mx-auto text-center text-2xl font-semibold">
                        New Arrival
                    </div>
                </div>
                {{-- Featured producrts--}}
                <div class="flex flex-col text-center justify-center md:flex-row">
                    @foreach ($products as $product)
                    
                     <x-product-card :product="$product" />
                               
                    @endforeach
                </div>
                    {{-- Featured products end --}}
                    <div class="mx-auto text-center text-2xl font-semibold my-4 md:mt-8 ">
                        Featured Product
                    </div>
                        {{-- Single Featured Product --}}
                {{-- main flex --}}
                <div class="flex flex-col md:flex-row">
                    {{-- flex item image --}}
                    <div class="md:m-2 md:w-1/2 w-full mx-auto">
                        <img src="https://cdn.shopify.com/s/files/1/0671/0621/products/sdfhht_800x.jpg?v=1651310074" alt="" class="w-full rounded-md">
                    </div>
                    {{-- flex item and data flex--}}
                    <div class="flex flex-col md:justify-start md:ml-2 mx-auto">
                        {{-- inner flex item discount--}}
                        <div class="w-max bg-yellow-600 text-white p-2 mx-auto my-2 md:ml-2">
                            Save 24 %
                        </div>
                        
                        {{-- inner flex item sale--}}
                        <div>
                            <img class="w-16 mx-auto my-2 md:ml-2" src="https://cdn.shopify.com/s/files/1/0671/0621/files/sale_new_op.png?v=1617442724" alt="">
                        </div>
                        {{-- inner flex item title --}}
                        <div class="border-b-2 border-b-slate-700 pb-3">
                            <h1 class="md:text-3xl text-2xl text-center md:text-left font-semibold">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas  
                            </h1>
                        </div>
                        {{-- inner flex item and flex --}}
                        <div class="flex flex-row justify-between text-sm">
                            {{--2nd inner flex item rating stars --}}
                                <ul class="flex flex-row my-2 justify-start flex-wrap">
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-indigo-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-indigo-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-indigo-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-solid fa-star text-indigo-500"></i></a></li>
                                    <li class=""><a href="#"><i class="fa-regular fa-star"></i></a></li>
                                    <li class="ml-1">120 Reveiws</li>
                                </ul>                            
                            {{-- 2nd inner flex item feedbacks --}}
                            <div class="my-2 text-center md:text-left">
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
                            <span class="text-indigo-300 line-through">
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
                            {{-- <livewire:counter /> --}}
                            <x-jet-button class="bg-indigo-500">
                                Shop Now
                            </x-jet-button>                            
                        </div>
                    </div>
                </div>
                <ul class="flex flex-row flex-wrap justify-center text-center bg-gray-300 p-3 my-3 w-screen -mx-4">
                    <li class="w-max mr-3"><i class="fa-solid fa-gift mr-1"></i>30 Days Happiness Guarantee</li>
                    <li class="w-max mr-3"><i class="fa-solid fa-heart mr-1"></i>Cash on delivery</li>
                    <li class="w-max mr-3"><i class="fa-solid fa-gem mr-1"></i>Everything we sell is genuine. We don't sell fake brands</li>                    
                </ul>
        </div>
        <div class="flex flex-col md:flex-row bg-gray-800 text-white p-2 text-center md:text-left">
            <div class="m-4 md:w-1/2">
                <h2 class="text-xl">About Us</h2>
                <p class="text-gray-300">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, distinctio. Unde inventore ab consequatur quaerat dolore sequi,
                     nam nulla labore est illo fuga quisquam incidunt. Excepturi laborum temporibus ad repellendus?
                </p>
                <ul class="flex flex-row justify-center">
                    <a href="#" class="m-2"><span class="fa-brands fa-facebook"></span></a>
                    <a href="#" class="m-2"><span class="fa-brands fa-instagram"></span></a>
                    <a href="#" class="m-2"><span class="fa-brands fa-linkedin"></span></a>
                    <a href="#" class="m-2"><span class="fa-brands fa-twitter"></span></a>
                </ul>
            </div>
            <div class="m-4">
                <h2 class="text-xl">Mailing Address</h2>
                <p class="text-gray-300">
                    11 KM Satiana Road <br>
                    Faisalabad, 
                    Pakistan <br>
                    042-1111-11 <br>
                    ( 09:30 AM to 05:30 PM Monday - Saturday )
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
