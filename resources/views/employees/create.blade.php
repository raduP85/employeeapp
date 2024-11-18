@extends('layout.master')

@section('content')

<x-page-header 
    title="{{ __('employees.create') }}" 
    description="{{ __('employees.create_description') }}">
</x-page-header>

<div class="py-6 px-4 sm:px-6 lg:px-8 bg-white mt-8 rounded">
  <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf

    @if($errors->any()) <x-error-message-alert :errors="$errors->all()" /> @endif

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">  
      <x-input-and-label inputType="text" fieldLabelName="Name" fieldName="name" value="{{ old('name') }}" />
      <x-input-and-label inputType="text" fieldLabelName="Email" fieldName="email" value="{{ old('email') }}" />
      <x-input-and-label inputType="tel" fieldLabelName="Phone" fieldName="phone" value="{{ old('phone') }}" />
      <x-input-and-label inputType="text" fieldLabelName="Job Title" fieldName="job_title" value="{{ old('job_title') }}" />
      <x-input-and-label inputType="number" fieldLabelName="Salary" fieldName="salary" value="{{ old('salary') }}" />
    </div>

    <div class="mt-8 flex justify-end gap-2">
      <x-cancel-link href="{{ route('employees.index') }}" />
      <x-action-button> {{ __('employees.create') }} </x-action-button>
    </div>

  </form>

</div>

@endsection