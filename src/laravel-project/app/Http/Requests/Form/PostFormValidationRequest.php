<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostFormValidationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'comment' => ['present'],
            'schema' => ['required', 'array'],
            'companyId' => ['required', 'regex:/^(C\-)+(\w){13}$/'],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'status' => 'validation error',
            'errors' => $validator->errors()
        ], 400);
        throw new HttpResponseException($response);
    }
}
