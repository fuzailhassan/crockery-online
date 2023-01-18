<li class="relative px-6 py-3">
    @if ($active)
    <span
      class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
      aria-hidden="true"
    ></span>
        
    @endif
    <a
      class="inline-flex items-center w-full text-sm font-semibold 
      transition-colors duration-150 hover:text-gray-800
      @if ($active)
         text-gray-800
         dark:text-white
        @endif
       dark:hover:text-gray-200"
      href="{{ $link }}"
    >
    @if (isset($icon))
        {{ $icon }}
    @else
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
    </svg>
    
    @endif
    
      
      <span class="ml-4">{{ $slot }}</span>
    </a>
  </li>