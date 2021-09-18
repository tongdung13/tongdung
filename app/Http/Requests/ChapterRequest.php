<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'story_id' => 'required',
            'chapter' => 'required',
            'chap' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'story_id.required' => 'Vui lòng nhập tên truyện',
            'chapter.required' => 'Vui lòng nhập tên chương',
            'chap.required' => 'Vui lòng nhập chương',
            'content.required' => 'Vui lòng nhập nội dung truyện',
        ];
    }
}
