@extends('layout.master')

@section('content')

<x-page-header 
    title="{{ __('employees.edit') }}" 
    description="{{ __('employees.edit_description', ['name' => $employee->name]) }}">
</x-page-header>

<div class="py-6 px-4 sm:px-6 lg:px-8 bg-white mt-8 rounded">
  <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @method('PUT')
    @csrf

    @if($errors->any()) <x-error-message-alert :errors="$errors->all()" /> @endif

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">  
      <x-input-and-label inputType="text" fieldLabelName="Name" fieldName="name" value="{{ $employee->name }}" />
      <x-input-and-label inputType="text" fieldLabelName="Email" fieldName="email" value="{{ $employee->email }}" />
      <x-input-and-label inputType="tel" fieldLabelName="Phone" fieldName="phone" value="{{ $employee->phone }}" />
      <x-input-and-label inputType="text" fieldLabelName="Job Title" fieldName="job_title" value="{{ $employee->job_title }}" />
      <x-input-and-label inputType="number" fieldLabelName="Salary" fieldName="salary" value="{{ $employee->salary }}" />
    </div>

    <div class="mt-8 flex justify-end gap-2">
      <x-cancel-link href="{{ route('employees.index') }}" />
      <x-action-button> {{ __('employees.edit') }} </x-action-button>
    </div>
  </form>

@endsection