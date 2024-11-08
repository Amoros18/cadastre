<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OuvertueDossierRequest extends FormRequest
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
            //'numero_ouverture' => 'required|string',
            'nom_requerant' => 'required|string',
            'sexe_requerant' => 'required',
            'telephone' => 'nullable|integer',
            'nature_dossier' => 'required|string',
            'arrondissement' => 'required|string',
            'quartier' => 'required|string',
            'lieu_dit' => 'required|string',
            'mappe' => 'nullable|string',
            'bloc' => 'nullable|string',
            'lot' => 'nullable|string',
            'numero_feuille' => 'nullable|string',
            'zone' => 'required|string',
            'date_ouverture'=>'required',
            'numero_decision'=>'required|string',
            // 'numero_decision'=>[
            //     'nullable',
            //     Rule::exists('decisions','numero_decision')
            // ],
        ];
    }

}
