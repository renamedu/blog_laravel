<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The field is required',
            'title.string' => 'String is required',
            'preview_image.required' => 'The field is required',
            'preview_image.file' => 'File is required',
            'main_image.required' => 'The field is required',
            'main_image.file' => 'File is required',
            'category_id.required' => 'The field is required',
            'category_id.integer' => 'Integer is required',
            'category_id.exists' => 'Category is not found',
            'tag_ids.array' => 'Array is required',
        ];
    }
}
