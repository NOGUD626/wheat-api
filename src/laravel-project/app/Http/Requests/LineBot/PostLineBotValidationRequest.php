<?php

namespace App\Http\Requests\LineBot;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostLineBotValidationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company' => ['required', 'string'],
        ];
    }

    public function validationData()
    {
        $params = $this->all();
        $route_params = $this->route()->parameters();
        return $params + $route_params;
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
