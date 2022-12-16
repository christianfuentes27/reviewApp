<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewEditRequest extends ReviewCreateRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function rules()
    {
        $rules = parent::rules();
        $rules['thumbnail'] = 'nullable';
        return $rules;
    }
}
