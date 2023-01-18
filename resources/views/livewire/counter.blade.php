    <div class="flex flex-row mr-8">
        <x-jet-button 
         
        class="bg-indigo-500 text-lg p-1"
        {{-- @if ($count<=1)
            disabled
        @endif --}}
        wire:click="decrement">
            -
        </x-jet-button>
        <input class="p-2 border-0 w-10 bg-slate-200 text-center" readonly type="text" value="{{ $count }}">
        <x-jet-button class="bg-indigo-500 text-lg p-0" wire:click="increment">
            +
        </x-jet-button>
    </div>
