<?php

namespace App\Http\Requests\Personal\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
      'title' => 'required|string',
      'content' => 'required|string',
      'category_id' => 'required|numeric|exists:categories,id',
      'tag_ids' => 'required|array',
      'tag_ids.*' => 'required|integer|exists:tags,id',
      'preview_img' => 'nullable|file',
      'main_img' => 'nullable|file',
    ];
  }

  public function messages(): array
  {
    return [
      'title.required' => 'Обязательное поле',
      'title.string' => 'Может быть толькo строкой',
      'content.required' => 'Обязательное поле',
      'content.string' => 'Может быть толькo строкой',
      'category_id.required' => 'Обязательное поле',
      'category_id.numeric' => 'Может быть толькo строкой',
      'category_id.exists' => 'Такой категории нет',
      'tag_ids.required' => 'Обязательное поле',
      'preview_img.required' => 'Обязательное поле',
      'preview_img.string' => 'Может быть толькo файлом',
      'main_img.required' => 'Обязательное поле',
      'main_img.string' => 'Может быть толькo файлом',
    ];
  }
}