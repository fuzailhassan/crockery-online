<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col overflow-hidden shadow-xl sm:rounded-lg p-6 justify-center">
                <div class="w-full">
                    <h1 class="text-center block m-2 font-bold text-3xl">
                        Add Details
                    </h1>
                </div>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="flex flex-col justify-center">
                        <div class="justify-center w-full md:w-2/3">
                            <x-jet-label for="shipping_address" value="{{ __('Shipping Address') }}" />
                            <textarea id="shipping_address" name="shipping_address" class="mt-1 p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="discription" cols="30" rows="3">{{ old('shipping_address') }}</textarea> 
                        </div>
                        <div class="justify-center w-full md:w-2/3">
                            <x-jet-label for="billing_address" value="{{ __('Billing Address') }}" />
                            <textarea id="billing_address" name="billing_address" class="mt-1 p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="discription" cols="30" rows="3">{{ old('billing_address') }}</textarea> 
                        </div>
                        <div class="mt-4 text-center">
                            <x-jet-button class="">
                                Submit
                            </x-jet-button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>