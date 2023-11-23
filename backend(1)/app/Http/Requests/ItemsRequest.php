<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'item_name' => 'required',
            'stock_quantity' => 'required|int',
            'unit_price' => 'required|int',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = array();
        foreach ($validator->errors()->getMessages() as $message) {
            $errors[] = $message[0];
        }
        throw new HttpResponseException(response()->json([
            'message' => 'Validation errors',
            'erros' => $errors
        ], 400));
    }
}
