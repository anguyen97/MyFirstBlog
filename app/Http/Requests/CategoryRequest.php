<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'description' =>'required|min:4|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required',            
            'name.min' => 'The name must have at least 3 characters',
            'name.max' => 'The name\'s lengh is not more than 100 characters',
            'description.required' => 'The description is required',
            'description.min' => 'The description must have at least 3 characters',
            'description.max' => 'The description\'s lengh is not more than 255 characters',
        ];        
    }
}
