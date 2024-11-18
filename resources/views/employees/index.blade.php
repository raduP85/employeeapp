@extends('layout.master')

@section('content')

<x-page-header 
    title="{{ __('employees.listing') }}" 
    description="{{ __('employees.listing_description') }}">
</x-page-header>

<div class="py-6 px-4 sm:px-6 lg:px-8 bg-white mt-8 rounded">
  <div class="flex items-center justify-between gap-4 mt-6 w-full">

    <div class="flex-grow">
      <div class="relative w-52">
        <form method="GET" action="{{ route('employees.index') }}">
          <input type="text" name="search" placeholder="Search by name..." value="{{ request('search') }}" autocomplete="off"
            class="bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-10 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Enter your text" />
          <button type="submit" class="absolute right-1 top-1 rounded bg-slate-800 p-1.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
              <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
            </svg>
          </button>
        </form>
      </div>
    </div>
    <div class="flex-shrink-0">
      @if(request()->query('sort_by'))
        <x-action-link href="{{ route('employees.index') }}">
          <i class="fa-solid fa-xmark"></i>
          Clear Sorting
        </x-action-link>
      @endif
    </div>
  </div>

  <div class="overflow-x-auto p-0">
    <table class="w-full mt-4 text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
              {{ __('employees.name') }}
            </p>
          </th>
          <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
              {{ __('employees.email') }}
            </p>
          </th>
          <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
              {{ __('employees.phone') }}
            </p>
          </th>

          @php
            $sortBy = request('sort_by');
            $sortOrder = request('sort_order');
            $secondarySortBy = request('secondary_sort_by');
            $secondarySortOrder = request('secondary_sort_order');

            // Determine the next sort order for the primary sort
            $nextSortOrder = $sortOrder === 'asc' ? 'desc' : 'asc';

            // Determine the next sort order for the secondary sort
            $nextSecondarySortOrder = $secondarySortOrder === 'asc' ? 'desc' : 'asc';

            // Build the query parameters for job_title
            $jobTitleParams = [
              'sort_by' => $sortBy === null ? 'job_title' : $sortBy,
              'sort_order' => $sortBy === 'job_title' ? $nextSortOrder : ($sortBy === null ? 'asc' : $sortOrder),
              'secondary_sort_by' => $sortBy === 'job_title' ? $secondarySortBy : 'job_title',
              'secondary_sort_order' => $sortBy === 'job_title' ? $nextSecondarySortOrder : ($secondarySortBy === 'job_title' ? $nextSecondarySortOrder : 'asc'),
            ];

            // Build the query parameters for salary
            $salaryParams = [
              'sort_by' => $sortBy === null ? 'salary' : $sortBy,
              'sort_order' => $sortBy === 'salary' ? $nextSortOrder : ($sortBy === null ? 'asc' : $sortOrder),
              'secondary_sort_by' => $sortBy === 'salary' ? $secondarySortBy : 'salary',
              'secondary_sort_order' => $sortBy === 'salary' ? $nextSecondarySortOrder : ($secondarySortBy === 'salary' ? $nextSecondarySortOrder : 'asc'),
            ];
          @endphp

          <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
            <a href="{{ route('employees.index', array_merge(request()->query(), $jobTitleParams)) }}" 
              class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                {{ __('employees.job_title') }}
                <i class="fa-solid fa-angle-{{ request('sort_by') === 'job_title' && request('sort_order') === 'asc' ? 'down' : 'up' }}"></i>
            </a>
          </th>
          <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
            <a href="{{ route('employees.index', array_merge(request()->query(), $salaryParams)) }}"
              class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                {{ __('employees.salary') }}
                <i class="fa-solid fa-angle-{{ request('sort_by') === 'salary' && request('sort_order') === 'asc' ? 'down' : 'up' }}"></i>
            </a>
          </th>
          <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
            <p class="flex items-center justify-center gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
              {{ __('employees.actions') }}
            </p>
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach($employees as $employee)
          <tr class="border-b border-slate-200">
            <td class="p-4">
              <p class="font-sans text-sm font-normal leading-none text-slate-500">
                <a href="{{ route('employees.show', $employee->id) }}" class="hover:text-slate-600">
                {{ $employee->name }}
                </a>
              </p>
            </td>
            <td class="p-4">
              <p class="font-sans text-sm font-normal leading-none text-slate-500">
                {{ $employee->email }}
              </p>
            </td>
            <td class="p-4">
              <p class="font-sans text-sm font-normal leading-none text-slate-500">
                {{ $employee->phone }}
              </p>
            </td>
            <td class="p-4">
              <p class="font-sans text-sm font-normal leading-none text-slate-500">
                {{ $employee->job_title }}
              </p>
            </td>
            <td class="p-4">
              <p class="font-sans text-sm font-normal leading-none text-slate-500">
                {{ $employee->salary }}
              </p>
            </td>
            <td class="p-4">
              <div class="flex items gap-2" role="group" aria-label="Actions">
                <x-action-link href="{{ route('employees.show', $employee->id) }}" 
                  class="hover:text-sky-200">
                  <i class="fa-solid fa-eye"></i>
                </x-action-link>

                <x-action-link href="{{ route('employees.edit', $employee->id) }}" 
                  class="hover:text-lime-200">
                  <i class="fa-solid fa-pencil"></i>
                </x-action-link>

                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-action-button type="submit" class="hover:text-rose-200">
                    <i class="fa-solid fa-trash"></i>
                  </x-action-button>
                </form>
              </div>
            </td> 
          </tr>

        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <td colspan="6" class="p-4">
            <div class="flex items-center justify-between gap-4">
              <div class="flex items-center gap-2">
                <span class="font-sans text-sm font-normal leading-none text-slate-500">
                  {{ __('employees.total_employees') }} : {{ $employees->total() }}
                </span> 
                <span class="font-sans text-sm font-normal leading-none text-slate-500">
                  {{ __('employees.showing') }} : {{ $employees->firstItem() }} - {{ $employees->lastItem() }}
                </span>
              </div>
              <div>
                {{ $employees->links('vendor.pagination.simple-tailwind') }}
              </div>
            </div>
          </td>
        </tr>
      </tfoot>

    </table>
  </div>

  <x-toastr />
</div>

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    @if(session('notification'))
      console.log('Notification found:', @json(session('notification')));
      window.dispatchEvent(new CustomEvent('notify', {
        detail: {
          message: "{{ session('notification')['message'] }}",
          type: "{{ session('notification')['type'] }}"
       }
      }));  
    @endif
  });
</script>
@endpush