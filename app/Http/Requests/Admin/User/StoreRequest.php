<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|string',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string',
      'role' => 'required|numeric'
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Обязательно для заполнения',
      'name.string' => 'Может быть только строкой',
      'email.required' => 'Обязательно для заполнения',
      'email.email' => 'Может быть только в виде: some@gmail.com',
      'email.unique' => 'Такой email уже есть',
      'password.required' => 'Обязательно для заполнения',
      'password.string' => 'Может быть только строкой',
      'role.required' => 'Обязательно для заполнения',
      'role.numeric' => 'Может быть только числом',
    ];
  }
}