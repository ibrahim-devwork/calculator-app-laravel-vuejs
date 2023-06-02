<?php

namespace App\Http\Requests;

use App\Rules\GreaterThanZeroIfDivision;
use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
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
            "operation"     => ['bail', 'required', 'numeric', 'min:0', 'max:3'],
            "first_number"  => ['bail', 'required', 'numeric'],
            "second_number" => ['bail', 'required', 'numeric', new GreaterThanZeroIfDivision($this->input('operation')) ],
        ];
    }
}
