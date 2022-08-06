<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class GetFormValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'formId' => ['required', 'regex:/^(FM\-)+(\w){13}$/'],
        ];
    }

    public function validationData()
    {
        $params = $this->all();
        $query_params = $param = $this->query('formId');
        return array_merge($params, compact('query_params'));
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
