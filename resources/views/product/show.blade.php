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
                        <img src="{{ $product->getFirstMediaUrl() ? $product->getFirstMediaUrl() : asset('storage/placeholder.jpg') }}" alt="" class="w-full rounded-md">
                    </div>
                    {{-- flex item and data flex--}}
                    <div class="flex flex-col sm:justify-start sm:ml-2 mx-auto w-full">
                        {{-- inner flex item discount--}}
                        <div class="flex flex-row justify-between">
                            
                            
                            @if ($product->discounted)
                            <div class="bg-indigo-600 text-white p-2 mx-auto my-2 sm:ml-2">
                                Save {{ round($product->discount/($product->price)*100) }} %
                            </div>                            
                            
                            @endif
                            @can(['update', 'delete'], $product)
                            <div class="flex">
                                <a href="/products/{{$product->id}}/edit">
                                <x-edit-icon />
                                </a>
                                <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <x-trash-icon />
                                    </button>
                                </form>

                            </div>                                
                            @endcan

                        </div>
                        {{-- inner flex item sale--}}
                        @if ($product->discounted)
                        <div class="bg-red-600 text-white p-2 mx-auto my-2 sm:ml-2 shadow-lg shadow-indigo-600">
                           On Sale!
                        </div>  
                            @endif
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
                                    <li class=""><i class=" {{ ($rating >= 1) ? 'text-indigo-500 fa-solid ' : 'fa-regular' }} fa-star "></i></li>
                                    <li class=""><i class=" {{ ($rating >= 2) ? 'text-indigo-500 fa-solid ' : 'fa-regular' }} fa-star "></i></li>
                                    <li class=""><i class=" {{ ($rating >= 3) ? 'text-indigo-500 fa-solid ' : 'fa-regular' }} fa-star "></i></li>
                                    <li class=""><i class=" {{ ($rating >= 4) ? 'text-indigo-500 fa-solid ' : 'fa-regular' }} fa-star "></i></li>
                                    <li class=""><i class="{{ ($rating >= 5) ? 'text-indigo-500 fa-solid ' : 'fa-regular' }} fa-star "></i></li>
                                    <li class="ml-1">{{ round($rating, 1) }}</li>
                                    <li class="ml-1">Total Ratings: {{ $product->reviews->count() }}</li>
                                </ul>                            
                            {{-- 2nd inner flex item feedbacks --}}
                            {{-- <div class="my-2 text-center sm:text-left">
                                <a href="#">
                                    <i class="fa-solid fa-message"></i>
                                20 Feedbacks
                                </a>                                
                            </div>                             --}}
                        </div>
                        {{-- inner flex item price --}}
                        <div class="font-semibold text-xl text-center">
                            <span class="">
                                @if ($product->discounted)
                                   Rs {{ $product->price - $product->discount }}
                                @endif
                               
                                
                            </span>
                            <span class="
                            @if ($product->discounted)
                            text-indigo-500 
                            line-through
                                @endif
                            ">
                                Rs {{ $product->price }}                                
                            </span>
                        </div>
                        {{-- inner flex item --}}
                        <div >
                            Categories:
                        </div>
                        {{-- inner flex item --}}
                        <ul class="flex flex-row space-x-2">
                            @foreach ($product->categories as $category)

                            <li class=""> <a class="text-md font-semibold underline" href="{{ route('categories.show', $category) }}">{{ $category->name ?? '' }}</a></li>
                                
                            @endforeach
                
                        </ul>
                        <div >
                            Material:
                        </div>
                        {{-- inner flex item --}}
                        <ul class="flex flex-row space-x-2">
                            @foreach ($product->materials as $material)

                            <li class=""> <a class="text-md font-semibold underline" href="{{ route('materials.show', $material) }}">{{ $material->name ?? '' }}</a></li>
                                
                            @endforeach
                
                        </ul>
                        {{-- inner flex item and flex --}}
                        <div class="flex flex-row justify-center">
                            {{-- <livewire:counter /> --}}
                            <livewire:add-to-cart :product_id="$product->id" />
                            {{-- <x-jet-button class="bg-indigo-500 ml-3">
                                Shop Now
                            </x-jet-button>                             --}}
                        </div>
                        {{-- inner flex item --}}
                        <div class="block text-left mt-3">
                            {!! $product->description !!}
                        </div>
                        <div class="flex flex-col space-y-3 border-0 border-t-black border-t-2">
                            <h2 class="text-2xl font-semibold mt-2">
                                Reviews
                            </h2>
                            @foreach ($product->reviews as $review)
                                
                            <div class="flex flex-col p-3 bg-slate-50 shadow-sm shadow-slate-200 rounded-md">
                                <h3 class="font-semibold text-blue-700">
                                    {{ $review->user->name }}
                                </h3>
                                <h3 class="font-bold text-xl">
                                    {{ $review->title }}
                                </h3>
                                <p class="italic text-lg text-indigo-700">
                                    Rating: <span class="font-semibold"> {{ $review->rating }} </span>
                                </p>
                                <p>
                                    {{ $review->description }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 border-0 border-t-black border-t-2">
                            <x-jet-validation-errors class="mb-4" />
                            <h1 class="text-2xl font-semibold mt-3">
                                Add a review <span class="text-sm font-light">(If you already posted a review it will be changed with this)</span>
                            </h1>
                            <form action="{{ route('products.reviews.store', $product) }}" method="POST">  
                                @csrf
                                <div class="mt-4">
                                    <x-jet-label for="title" value="{{ __('Title') }}" />
                                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="description" value="{{ __('Description') }}" />
                                    <textarea id="description" name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="5">{{old('description')}}</textarea> 
                                </div>
                                <div class="mt-4 flex flex-row space-x-2 items-center">
                                    <x-jet-label for="rating" value="{{ __('Rating') }}" />
                                        <x-jet-label for="1" value="{{ __('1') }}" />
                                        <x-jet-input id="1" class="mt-1 w-2 h-2 rounded-full text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" type="radio" name="rating" value="1" />
                                        <x-jet-label for="2" value="{{ __('2') }}" />
                                        <x-jet-input id="2" class="mt-1 w-2 h-2 rounded-full text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" type="radio" name="rating" value="2" />
                                        
                                        <x-jet-label for="3" value="{{ __('3') }}" />
                                            <x-jet-input id="3" class="mt-1 w-2 h-2 rounded-full text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" type="radio" name="rating" value="3" />
                                        
                                        <x-jet-label for="4" value="{{ __('4') }}" />
                                            <x-jet-input id="4" class="mt-1 w-2 h-2 rounded-full text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" type="radio" name="rating" value="4" />
                                        
                                        <x-jet-label for="5" value="{{ __('5') }}" />
                                        <x-jet-input id="5" class="mt-1 w-2 h-2 rounded-full text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" type="radio" name="rating" value="5" />                                        
                                </div>
                                
                                <div class="text-center my-4">
                                
                                    <x-jet-button class="">
                                        Submit Review
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>