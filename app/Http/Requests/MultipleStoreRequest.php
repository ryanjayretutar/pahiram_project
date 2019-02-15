<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ItemDetailRequest;

class MultipleStoreRequest extends FormRequest
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
         $formRequests = [
          ProductStoreRequest::class,
          ItemDetailRequest::class
        ];

        $validated = [];

        foreach ($formRequests as $source) {
          $validated = array_merge($validated,(new $source)->validated());
        }

        return $validated;
    }
}
