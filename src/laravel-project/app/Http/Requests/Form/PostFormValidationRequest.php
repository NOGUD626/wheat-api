<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostFormValidationRequest extends FormRequest
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
     * https://zenn.dev/moroshi/articles/56d02e4b9cabe0
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'comment' => ['present'],
            'schema' => ['required', 'array'],
            'companyId' => ['required', 'regex:/^(C\-)+(\w){13}$/'],
        ];
    }

    /**
     *
     * @param Validator $validator
     * @return HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'status' => 'validation error',
            'errors' => $validator->errors()
        ], 400);
        throw new HttpResponseException($response);
    }
}
