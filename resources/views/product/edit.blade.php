<x-dashboard-layout>
        <x-slot:heading>
            Edit Product
        </x-slot>
                <x-jet-validation-errors class="mb-4" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    tinymce.init({
                        selector: '#description'
                    });
                </script>
 
                        <form method="POST" action="{{ route('products.update',$product->id) }}" class="block" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                    <div class="">
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $product->name }}"   required autofocus autocomplete="name" />
                                    </div>
                        
                                    <div class="mt-4">
                                        <x-jet-label for="price" value="{{ __('Price') }}" />
                                        <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" value="{{ $product->price }}" required />
                                    </div>
                                    
            
                                    <div class="mt-4">
                                        <input type="hidden" name="discounted" value="0" />
                                        <x-jet-label for="discounted" value="{{ __('Discounted?') }}" />
                                        <input
                                        type="checkbox" 
                                        id="discounted" 
                                        class="block mt-1 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'" 
                                        name="discounted" 
                                        value="1"
                                        @checked($product->discounted)                                        
                                        />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="discount" value="{{ __('Discount') }}" />
                                        <x-jet-input id="discount" class="block mt-1 w-full" type="number" name="discount" :value="old('discount')" value="{{ $product->discount }}" />
                                    </div>
                                    
                                <div class="mt-4">
                                    <x-jet-label for="category" value="{{ __('category') }}" />
                                    {{-- <x-jet-input id="category" class="block mt-1 w-full" type="number" name="category" :value="old('category')" value="{{ $product->category->name }}" /> --}}
                                        <select id="category" name="category[]" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected($product->categories()->find($category->id))>{{ $category->name }}</option>                                                
                                            @endforeach
                                        </select>
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="brand" value="{{ __('brand') }}" />
                                    {{-- <x-jet-input id="brand" class="block mt-1 w-full" type="number" name="brand" :value="old('brand')" value="{{ $product->brand->name }}" /> --}}
                                        <select id="brand" name="brand" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @selected($product->brand()->find($brand->id))>{{ $brand->name }}</option>                                                
                                            @endforeach
                                        </select>
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="material" value="{{ __('material') }}" />
                                    {{-- <x-jet-input id="material" class="block mt-1 w-full" type="number" name="material" :value="old('material')" value="{{ $product->material->name }}" /> --}}
                                        <select id="material" name="material[]" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple>
                                            @foreach ($materials as $material)
                                            <option value="{{ $material->id }}" @selected($product->materials()->find($material->id)!=null) >{{ $material->name }}</option>                                                
                                            @endforeach
                                        </select>
                                </div>
                                {{-- form section --}}
                                <div class="mt-4">
                                    <x-jet-label for="description" value="{{ __('Description') }}" />
                                    <textarea id="description" name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="10">{{old('description') ? old('description') : $product->description}}</textarea> 
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="images" value="{{ __('images') }}" />
                                    <input type="file" id="images" name="images" />
                                </div>
                                
                            </div>
                            <div class="text-center">
                                
                                <x-jet-button class="mb-8">
                                    Update Product
                                </x-jet-button>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>