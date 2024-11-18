<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreUpdateRequest extends FormRequest
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
      'name' => ['required', 'string', 'max:255'],
      'email' => [
        'required', 
        'email', 
        'max:255',
        Rule::unique('employees')->ignore($this->employee),
      ],
      // 'phone' => ['required', 'regex:/^(\+\d{1,3})?\d{9,10}$/', 'max:12'], //TODO: radu - build new regex validation for other non standard accepting () - .
      'phone' => ['required', 'string', 'max:20'],
      'job_title' => ['required', 'string', 'max:255'],
      'salary' => ['required', 'numeric'],
    ];
  }
}
