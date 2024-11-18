<nav class="py-4 px-4 sm:px-6 lg:px-8 bg-white rounded">
  <ol class="flex text-sm font-medium leading-5 text-gray-500">
    <li class="flex items-center">
      <x-employee-nav-button href="{{ route('employees.index') }}">
        {{ __('employees.section_name') }}
      </x-employee-nav-button>
      <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    </li>
    <li class="flex items-center">
      <x-employee-nav-button href="{{ route('employees.create') }}">
        <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        {{ __('employees.add') }}  
      </x-employee-nav-button>
    </li>
  </ol>
</nav>