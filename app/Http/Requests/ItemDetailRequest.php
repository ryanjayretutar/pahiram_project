<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemDetailRequest extends FormRequest
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
        return $validated = [
            'image_path' => 'required',
            'description' => 'required|string',
            'item_value' => 'required|numeric',
            'model' => 'required|string'
        ];
    }

      public function messages()
    {
        return [
            'image_path.required' => 'Upload an image of this product',
            'description.required' => 'Enter the description of the product',
            'item_value.required' => 'Set the value of this product',
            'model.required' => 'Enter a specific model',
        ];
    }
}
