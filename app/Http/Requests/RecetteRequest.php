<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecetteRequest extends FormRequest
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
            'nouveau_dossier_id'=>'required',
            'montant_recette'=>'required|integer',
            'cumule'=>'nullable|string',
            'superficie_recette'=>'required|string',
            'date_cession'=>'nullable|date',
            'numero_quittance'=>[
                'required',
                'string',
                Rule::unique('quittances','numero_quittance')
            ],
            'date_quittance'=>'required|date',
            'observation_recette'=>'nullable|string', // a vrifier longtexte
            //'numero_quittance'=>'required|string|unique:quittances,numero_quittance,NULL,'.$this->input('numero_quittance').',date_quittance,'.$this->input('date_quittance'),
        ];
    }
}
