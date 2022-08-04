<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FormsAPIValidationRequest extends FormRequest
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
            "companyId" => ['required', 'regex:/^(C\-)+(\w){13}$/'],
        ];
    }

    /**
     * 更新、削除時に渡されるルート引数を Request Parametersに含める。
     * ただし、すでにキーが存在している場合は上書きしない。
     * @return array
     */
    public function validationData()
    {
        $params = $this->all();
        $route_params = $this->route()->parameters();
        return $params + $route_params;
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
