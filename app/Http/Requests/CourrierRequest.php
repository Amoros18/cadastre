<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourrierRequest extends FormRequest
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
            'date_arrive'=>'required|date',
            'date_correspondance'=>'required|date',
            'numero_correspondance'=>'required',
            'expediteur'=>'required',
            'objet'=>'required',
            'numero_reponse'=>'nullable',
            'image'=>'nullable',
        ];
    }
}
