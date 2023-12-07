<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\YearRule;
use App\Rules\SundayRule;

class SundayRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 200)
        );
    }

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
            'start_date'    => ['required', 'date_format:Y-m-d', new SundayRule],
            'end_date'      => ['required', 'date_format:Y-m-d', 'after:start_date', new YearRule]
        ];
    }

    public function messages()
    {
        return [
            'start_date.required'       => 'Please select start date',
            'start_date.date_format'    => 'Start date format must be Y-m-d',
            'end_date.required'         => 'Please select end date',
            'end_date.date_format'      => 'End date format must be Y-m-d',
            'end_date.after'            => 'End date must be grater then start date'
        ];
    }
}
