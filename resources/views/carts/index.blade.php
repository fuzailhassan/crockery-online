<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:p-8">                
                <div class="overflow-auto flex flex-col">
                    <livewire:cart :carts="$carts" />
                    <div class="mx-auto my-2">
                        <button class="w-max p-2 items-center border border-transparent rounded-md  text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 transition bg-indigo-500">
                            <a href="{{ route('orders.create') }}">
                                Checkout
                            </a>
                        </button>
                    </div>

                </div>
                 
            </div>
        </div>
    </div>
</x-app-layout>