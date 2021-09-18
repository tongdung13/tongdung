<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'story_name' => 'required',
            'author' => 'required',
            'publish' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'story_name.required' => 'Vui lòng nhập tên truyện!',
            'author.required' => 'Vui lòng nhập tên tác giả!',
            'publish.required' => 'Vui lòng nhập mô tả!',
            'status.required' => 'Vui lòng nhập trạng thái!',
        ];
    }
}
