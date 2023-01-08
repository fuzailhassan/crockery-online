    <div class="flex flex-row mr-8">
        <x-jet-button 
         
        class="bg-amber-500 text-lg h-8"
        {{-- @if ($count<=1)
            disabled
        @endif --}}
        wire:click="decrement">
            -
        </x-jet-button>
        <input class="w-16 h-8 border-0 bg-slate-200 text-center" readonly type="text" value="{{ $count }}">
        <x-jet-button class="bg-amber-500 text-lg h-8" wire:click="increment">
            +
        </x-jet-button>
    </div>
