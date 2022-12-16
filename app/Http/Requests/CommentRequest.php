<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
    
    function attributes() {
        return [
            'message' => 'Comment'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'message' => 'required|string|max:80|min:2'
        ];
    }
    
    function messages() {
        return[
            'message.required' => ':attribute required',
            'message.string' => ':attribute is a string',
            'message.max' => 'Max length of :attribute is :max',
            'message.min' => 'Min length of :attribute is :min'
        ];
    }
}
