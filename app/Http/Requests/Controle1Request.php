<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Controle1Request extends FormRequest
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
            'numero_controle'=>'nullable',
            'controlleur_1'=>'required',
            'date_controle_1'=>'nullable',
        ];
    }
}
