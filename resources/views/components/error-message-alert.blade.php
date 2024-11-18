@props(['errors'])

<div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded relative mb-4" role="alert">
  <p>
    <i class="fa-solid fa-exclamation-triangle"></i>
    <strong class="font-bold">{{ __('employees.error_alert_message') }}</strong>
  </p>
  <ul class="list-disc list-inside text-sm text-slate-900 mt-2">
    @foreach ($errors as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>    
</div>