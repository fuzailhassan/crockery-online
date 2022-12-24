<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="w-full">
                    <h1 class="text-center block m-2 font-bold text-3xl">
                        Add Product
                    </h1>
                </div>
                <x-jet-validation-errors class="mb-4" />
                
                <div class="flex flex-col sm:flex-row justify-center">
                {{-- form --}}
                    <div>
                        <form method="post" action="{{ route('products.store') }}" class="block">
                            @csrf
                            {{-- form sections --}}
                            <div class="flex flex-col sm:flex-row justify-center justify-items-center">
                                {{-- form secton --}}
                                <div class="">

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
                                    <div class="mt-4 text-center">
                                        <x-jet-button class="">
                                            Submit
                                        </x-jet-button>
            
                                    </div>
                                </div>
                                {{-- form section --}}
                                <div class="ml-5">
                                    <x-jet-label for="description" value="{{ __('Description') }}" />
                                    <textarea name="description" class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="discription" cols="30" rows="10">{{ old('discription') }}</textarea> 
                                </div>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>