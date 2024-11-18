<header>
  <x-employee-nav></x-employee-nav>
  
  <div class="py-6 px-4 sm:px-6 lg:px-8 bg-white rounded">
    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ $title }}</h2>
    @if(!empty($description))<p class="mt-1 text-sm leading-6 text-gray-600">{{ $description }}</p>@endif
  </div>  
</header>