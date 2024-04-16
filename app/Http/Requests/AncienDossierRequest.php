<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AncienDossierRequest extends FormRequest
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
        'numero_dossier'=>'required',
        'nom_requerant'=>['required','min:4'],
        'telephone'=>'nullable',
        'nature_dossier'=>'required',
        'arrondissement'=>'nullable',
        'zone'=>'nullable',
        'quartier'=>'nullable',
        'lieu_dit'=>'nullable',
        'mappe'=>'nullable',
        'bloc'=>'nullable',
        'lot'=>'nullable',
        'numero_feuille'=>'nullable',
        'date_ouverture'=>'nullable',
        'geometre'=>'nullable',
        'montant_recette'=>'nullable',
        'cumule'=>'nullable',
        'superficie_recette'=>'nullable',
        'date_cession'=>'nullable',
        'numero_quittance'=>'nullable',
        'date_quittance'=>'nullable',
        'observation_recette'=>'nullable', // a vrifier longtexte
        'montant_rattachement'=>'nullable',
        'date_rattachement'=>'nullable',
        'observation_rattachement'=>'nullable', // a verifier longtexte
        'echelle'=>'nullable',
        'dao'=>'nullable',
        'data'=>'nullable',
        //'point'=>'nullable',
        'longitude'=>'nullable',
        'latitude'=>'nullable',
        'superficie'=>'nullable',
        'date_ccp'=>'nullable',
        'message_porter'=>'nullable',
        'mise_en_valeur'=>'nullable',
        'avis_main_courante'=>'nullable',
        'date_bornage'=>'nullable',
        'observation_main_courante'=>'nullable',
        's_c'=>'nullable',
        'numero_ccp'=>'nullable',
        'numero_controle'=>'nullable',
        'controlleur_1'=>'nullable',
        'date_controle_1'=>'nullable',
        'controlleur_2'=>'nullable',
        'date_controle_2'=>'nullable',
        'numero_mj'=>'nullable',
        'verificateur'=>'nullable',
        'avis_mj'=>'nullable',
        'numero_visa'=>'nullable',
        'date_visa'=>'nullable',
        'numero_decision'=>[
            'nullable',
            Rule::exists('decisions','numero_decision')
        ],
        ];
    }
}
