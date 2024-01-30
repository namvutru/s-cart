<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CreateCategoryRequest extends FormRequest
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
            'name_en' => 'required',
            'parent' => 'required',
            'slug' => 'required|unique:table_category',
            'status' => 'required',
        ];
    }
    
   
    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = (new ValidationException($validator))->errors();
    //     throw new HttpResponseException(response()->json(
    //         [
    //             'error' => $errors,
    //             'status_code' => 422,
    //         ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));

    //     // $response = new Response([
    //     //     'errors' => $validator->errors() ,
    //     // ],Response::HTTP_UNPROCESSABLE_ENTITY);
    //     // throw (new ValidationException($validator,$response));
    // }
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
