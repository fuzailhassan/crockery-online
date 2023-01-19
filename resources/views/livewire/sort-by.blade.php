<div class="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 align-middle justify-center mt-3" x-data>
    {{-- <select wire:onChange="sortBy" wire:model="sortBy" x-on:change=" $wire:sortBy( this.selectedIndex ) " id="sortBy" name="sortBy" class="block w-60 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" > --}}
        
        {{-- <x-jet-label for="sortBy" value="{{ __('Sort by:' ) }}" /> --}}
        <p class="font-semibold">Sort by:</p>
        <div>
            <input type="radio" id="price_low" name="sortBy" wire:model="sortBy" wire:click="sortBy" value="price_low">                                              
            <label for="price_low"> Price Low</label>
        </div>
        <div class="">            
            <input type="radio" id="price_high" name="sortBy" wire:model="sortBy" wire:click="sortBy" value="price_high">                                              
            <label for="price_high"> Price High</label>
        </div>
        <div class="">            
            <input type="radio" id="latest" name="sortBy" wire:model="sortBy" wire:click="sortBy" value="latest">                                              
            <label for="latest"> Latest</label>
        </div>
        <div class="">            
            <input type="radio" id="oldest" name="sortBy" wire:model="sortBy" wire:click="sortBy" value="oldest">                                              
            <label for="oldest"> Oldest</label>
        </div>
                 
    </div>
    <div class="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 align-middle justify-center mt-3" x-data>
        <p class="font-semibold">By category:</p>
        @foreach ($categories as $category)
        <div>
            <form action="{{route('categories.show', $category->id)}}" method="get">
                <button>{{ $category->name }}</button>
            </form>
        </div>
            
        @endforeach
    </div>


