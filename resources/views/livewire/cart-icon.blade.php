<a href="{{ route('cart.index') }}">
    <span class="flex">
        <x-cart-icon class="" />
        <span class="inline-block text-xs h-6 bg-indigo-600 text-white p-1 mt-0 rounded-full">
            {{ $noOfCarts }}
        </span>

    </span>
</a>
