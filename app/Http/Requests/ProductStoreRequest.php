<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
       return $validated =  [
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'product_name' => 'required|string|max:50',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|numeric'];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Select a Category for this item',
            'brand_id.required' => 'Select the brand of this item',
            'product_name.required' => 'Enter the name of the product',
            'product_price.required' => 'Set a price for this product',
            'product_stock.required' => 'Set the initial quantity of the product',
        ];
    }


}
