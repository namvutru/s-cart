<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'old_price' => 'required',
            'quantity' => 'required',
            'code' => 'required',
            'description' => 'required',
            'hot'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'status' => 'required',
        
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) : void
    {
        $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(response()->json(
                [
                    'error' => $errors,
                    'status_code' => 422,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    
}
