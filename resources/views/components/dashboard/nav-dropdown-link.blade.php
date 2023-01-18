<li
          class="px-2 py-1 transition-colors duration-150 
          @if($active)
            text-gray-800
            dark:text-white
          @endif
          hover:text-gray-800 dark:hover:text-gray-200"
        >
          <a class="w-full" href="{{ $link }}">
        {{ $slot }}
        </a>
        </li>