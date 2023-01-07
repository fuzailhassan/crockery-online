<div class="flex flex-col sm:flex-row justify-center">
    <table class="table-fixed border-collapse p-3 m-3"> 
     <tr>
         <th class="p-3 border border-white text-white bg-amber-500"> Product </th>
         <th class="p-3 border border-white text-white bg-amber-500"> Unit Price </th>
         <th class="p-3 border border-white text-white bg-amber-500"> Quantity </th>
         <th class="p-3 border border-white text-white bg-amber-500"> Total Price </th>
         <th class="p-3 border border-white text-white bg-amber-500"> </th>
     </tr>
     @php
         $cartTotal = 0;
     @endphp
        @foreach ($carts as $cart)
        <livewire:cart-item :cart="$cart" :cartTotal="$cartTotal" :wire:key="$cart->id" />
        @endforeach 
    <tr>
        <td class="p-3"></td>
        <td class="p-3"></td>
        <td class="p-3"></td>
        <td class="p-3"></td>
        <td class="p-3">Total {{ $cartTotal }}</td>
    </tr>    
    </table>
 </div>