<!DOCTYPE html>
<html :class="{ 'dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    
    {{-- @vite(['resources/css/app.css']) --}}
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="newer stylesheet" href="{{ asset('administerator/assets/css/tailwind.output.css') }}" />

    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('administerator/assets/js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{ asset('administerator/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('administerator/assets/js/charts-pie.js') }}" defer></script>
  </head>
  <body>
    <x-dashboard.banner />

    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
    <x-dashboard.navigation />
    <!-- Mobile sidebar -->
    <x-dashboard.mobile-navigation />
    <div class="flex flex-col flex-1 w-full">
    <x-dashboard.header />
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            @if (isset($heading))
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $heading }}
            </h2>
                
            @endif

    {{ $slot }}
        </div>
    </main>

    </div>
    </div>
  </body>
</html>