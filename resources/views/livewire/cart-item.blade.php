<tr x-data="{ show : @entangle('display') }" x-show="show"  x-transition.duration.1000ms x-init="show = true" >
        <td class="w-60 p-3">{{ $cart->product->name }}</td>
        <td class="p-3">{{ $cartPrice = ($cart->product->discounted) ? $cart->product->price - $cart->product->discount : $cart->product->price ;  }}</td>
        <td class="p-3">
            @livewire('counter', [
                'count' => $cart->quantity, 
                'cart_id' => $cart->id
                ])
        </td>
        
        <td class="p-3">{{ $cart->quantity * $cartPrice }}</td>
        <td class="p-3"><button wire:click="deleteCartItem" name="delete" > Delete</button></td>
    
</tr>