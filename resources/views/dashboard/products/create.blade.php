<x-dashboard-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script>
        tinymce.init({
            selector: '#description'
        });
    </script>
    
    <x-slot:heading>
        Create Product
    </x-slot>
                <x-jet-validation-errors class="mb-4" />
                
                {{-- <div class="flex flex-col sm:flex-row justify-center"> --}}
                {{-- form --}}
                    <div>
                        <form method="post" action="{{ route('products.store') }}" class="block">
                            @csrf
                            {{-- form sections --}}
                            {{-- <div class="flex flex-col md:flex-row justify-center justify-items-center dark:bg-gray-800 px-4 py-3 mb-8 bg-white rounded-lg shadow-md"> --}}
                                {{-- form secton --}}
                                <div class="px-4 py-3 mb-8 bg-white dark:bg-gray-800">

                                    <div>
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    </div>
                        
                                    <div class="mt-4">
                                        <x-jet-label for="price" value="{{ __('Price') }}" />
                                        <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                                    </div>
            
                                    <div class="mt-4">
                                        <input type="hidden" name="discounted" value="0" />
                                        <x-jet-label for="discounted" value="{{ __('Discounted?') }}" />
                                        <x-jet-checkbox id="discounted" class="block mt-1" name="discounted" value="1" />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="discount" value="{{ __('Discount') }}" />
                                        <x-jet-input id="discount" class="block mt-1 w-full" type="number" name="discount" :value="old('discount')" />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="category" value="{{ __('category') }}" />
                                        <x-jet-input id="category" class="block mt-1 w-full" type="number" name="category" :value="old('category')" />
                                    </div>
                                    <div class="mt-4 text-center">
                                        
                                    </div>
                              
                                    <x-jet-label for="description" value="{{ __('Description') }}" />
                                    <textarea id="description" name="description" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="discription" cols="30" rows="10">{{ old('discription') }}</textarea> 
                                </div> 
                                <div class="flex justify-center mb-4">
                                    <x-jet-button class="">
                                        Submit
                                    </x-jet-button>
                                </div> 
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>