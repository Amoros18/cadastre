<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RejetRequest extends FormRequest
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
            'numero_dossier'=>'string|required',
            'motif'=>'string|required',
            'date_rejet'=>'nullable|required',
            'etat'=>'string',
        ];
    }
}
