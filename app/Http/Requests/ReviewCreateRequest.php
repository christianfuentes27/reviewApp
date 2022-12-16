<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCreateRequest extends FormRequest
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
            'type' => 'Review type',
            'title' => 'Review title',
            'review' => 'Review content',
            'thumbnail' => 'Review thumbnail'
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
            'type' => 'required|in:Book,Movie,Record',
            'title' => 'required|string|max:80|min:2',
            'review' => 'required|string|max:500|min:2',
            'thumbnail' => 'required'
        ];
    }
    
    function messages() {
        $required = 'Field :attribute required';
        $string = 'Field :attribute is a string';
        $max = 'Max length of :attribute is :max';
        $min = 'Min length of :attribute is :min';
        
        return [
            'type.required' => $required,
            'type.in' => 'Field :attribute has to be: Book, Movie or Record',
            
            'title.required' => $required,
            'title.string' => $string,
            'title.max' => $max,
            'title.min' => $min,
            
            'review.required' => $required,
            'review.string' => $string,
            'review.max' => $max,
            'review.min' => $min,
            
            'thumbnail.required' => $required,
        ];
    }
}
