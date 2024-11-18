<nav class="bg-gray-800" x-data="{ open: false }">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button @click="open = !open" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!-- Icon when menu is closed. -->
          <svg x-show="!open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
          <!-- Icon when menu is open. -->
          <svg x-show="open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center text-white">
          {{ config('app.name') }}
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="{{ route('home') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Home</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
       

      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu" x-show="open">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <a href="{{ route('home') }}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
    </div>
  </div>
</nav>