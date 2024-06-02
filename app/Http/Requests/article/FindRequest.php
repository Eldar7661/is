<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class FindRequest extends FormRequest
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
            'id' => 'integer',
        ];
    }

    public function messages() {
        return [
            'id' => [
                'integer' => 'Error in URL-address'
            ]
        ];
    }
}
