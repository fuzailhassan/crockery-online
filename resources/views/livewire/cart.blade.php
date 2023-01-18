<div class="flex flex-col md:flex-row justify-center">
    <table class="table-fixed border-collapse p-3 m-3"> 
     <tr>
         <th class="p-3 border border-white text-white bg-indigo-500"> Product </th>
         <th class="p-3 border border-white text-white bg-indigo-500"> Unit Price </th>
         <th class="p-3 border border-white text-white bg-indigo-500"> Quantity </th>
         <th class="p-3 border border-white text-white bg-indigo-500"> Total Price </th>
         <th class="p-3 border border-white text-white bg-indigo-500"> </th>
     </tr>
    
        @foreach ($carts as $cart)
        @if (is_array($cart))
            @php
                continue;
            @endphp
        @endif
        <tr class="odd:bg-indigo-50" x-data="{ show : @entangle('display') }" x-show="show"  x-transition.duration.1000ms x-init="show = true" >
            <td class="w-60 p-3">{{ $cart->product->name }}</td>
            <td class="p-3">{{ $cartPrice = ($cart->product->discounted) ? $cart->product->price - $cart->product->discount : $cart->product->price ;  }}</td>
            <td class="p-3">
                <livewire:counter :count="$cart->quantity" :cart_id="$cart->id" />
            </td>
            
            <td class="p-3">{{ $cart->quantity * $cartPrice }}</td>
            <td class="p-3"><button wire:click="deleteCartItem({{$cart}})" name="delete" > Delete</button></td>
        
        </tr>
        {{-- <livewire:cart-item :cart="$cart" :wire:key="$cart->id" /> --}}
         
        @endforeach 
    <tr>
        <td class="p-3"></td>
        <td class="p-3"></td>
        <td class="p-3 text-right">Total</td>
        <td class="p-3">{{ $cartTotal }}</td>
        <td class="p-3"></td>
    </tr>    
    </table>
    
 </div>