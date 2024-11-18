<div class="sm:col-span-2">
  <label for="{{ $fieldName }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $fieldLabelName }}</label>
  <div class="mt-2">
    <input type="{{ $inputType }}" name="{{ $fieldName }}" id="{{ $fieldName }}" value="{{ $value }}" required
      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
  </div>
</div>