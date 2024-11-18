@extends('layout.master')

@section('content')

<x-page-header title="{{ __('employees.show') }}"></x-page-header>

<div class="py-6 px-4 sm:px-6 lg:px-8 bg-white mt-8 rounded">
  <p class="text-slate-800 text-sm font-normal leading-none mb-4"> Name: <span class="font-bold">{{ $employee->name }}</span></p>
  <p class="text-slate-800 text-sm font-normal leading-none mb-4"> Email: <span class="font-bold">{{ $employee->email }}</span></p>
  <p class="text-slate-800 text-sm font-normal leading-none mb-4"> Phone: <span class="font-bold">{{ $employee->phone }}</span></p>
  <p class="text-slate-800 text-sm font-normal leading-none mb-4"> Job Title: <span class="font-bold">{{ $employee->job_title }}</span></p>
  <p class="text-slate-800 text-sm font-normal leading-none mb-4"> Salary: <span class="font-bold">{{ $employee->salary }}</span></p>
  
  <div class="mt-8 flex justify-end gap-2">
    <x-cancel-link href="{{ route('employees.index') }}">
      <i class="fa-solid fa-arrow-left"></i>
      Go Back
    </x-cancel-link>
  </div>
</div>
@endsection