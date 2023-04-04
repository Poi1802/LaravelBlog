<?php

namespace App\Http\Requests\Admin\Post;

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
}