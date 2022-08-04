<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FormAPIValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        # 認証の仕組みがない場合は何でも通すという意味でtrueを設定
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
            "formId" => ['required', 'regex:/^(FM\-)+(\w){13}$/'],
        ];
    }

    /**
     * 
     * 
     * @return array
     */
    public function validationData()
    {
        $params = $this->all();
        $query_params = $param = $this->query('formId');
        return array_merge($params, compact('query_params'));
    }

    /**
     * バリデーションエラーが起きたら実行される
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
