@extends('layout.master')

@section('content')

<div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-8">
  <h1 class="text-xl text-teal-600">Home</h1>
  
  <div class="mt-24">
    <x-action-link href="{{ route('employees.index') }}">Blade: Employees Section</x-action-link>
  </div>
</div>
@endsection