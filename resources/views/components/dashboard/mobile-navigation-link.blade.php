<li class="relative px-6 py-3">
    @if ($active)
    <span
      class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
      aria-hidden="true"
    ></span>
        
    @endif
    <a
      class="inline-flex items-center w-full text-sm font-semibold 
      @if ($active)
         text-gray-800
         dark:text-white
        @endif
      transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
      href="{{ $link }}"
    >
    @if (isset($icon))
        {{ $icon }}
    @else
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
        ></path>
      </svg>
      @endif
      <span class="ml-4">{{ $slot }}</span>
    </a>
  </li>