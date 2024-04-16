<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortieGeometreRequest extends FormRequest
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
            'date_travaux'=>'required',
            'liste_materiaux'=>'required',
            'observation'=>'required',
            'liste_geometre'=>'required',
        ];
    }
}
