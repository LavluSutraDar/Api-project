<?php

namespace App\Http\Requests;

use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Resources\ErrorResource;
use Illuminate\Auth\Access\Response;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories',
            'email' => 'required|unique:categories',
            'phone' => 'required|unique:categories',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // protected function failedValidation(Validator $validator)
    // { 
    //      $response = (new ErrorResource($validator->errors()))->response()->setStatusCode(422);
    //      throw new ValidationException($validator,$response);

    // }
}
