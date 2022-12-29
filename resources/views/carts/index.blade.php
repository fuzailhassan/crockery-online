<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col sm:flex-row justify-center">
                   <table class="table-fixed border-collapse p-3 m-3"> 
                    <tr>
                        <th class="p-3 border border-white text-white bg-amber-500"> Product </th>
                        <th class="p-3 border border-white text-white bg-amber-500"> Unit Price </th>
                        <th class="p-3 border border-white text-white bg-amber-500"> Quantity </th>
                        <th class="p-3 border border-white text-white bg-amber-500"> Total Price </th>
                    </tr>
                       @foreach ($carts as $cart)
                       <tr>
                        <td class="w-60 p-3">{{ $cart->product->name }}</td>
                        <td class="p-3">{{ $cartPrice = ($cart->product->discounted) ? $cart->product->price - $cart->product->discount : $cart->product->price ;  }}</td>
                        <td class="p-3">
                            @livewire('counter', [
                                'count' => $cart->quantity, 
                                'cart_id' => $cart->id
                                ])
                            </td>
                        <td class="p-3">{{ $cart->quantity * $cartPrice }}</td>

                       </tr>
                       @endforeach 

                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>