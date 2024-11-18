<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeSearchRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'search' => 'nullable|string',
      'sort_by' => 'nullable|string|in:name,job_title,salary',
      'sort_order' => 'nullable|string|in:asc,desc',
      'secondary_sort_by' => 'nullable|string|in:name,job_title,salary',
      'secondary_sort_order' => 'nullable|string|in:asc,desc',
    ];
  }
}
