<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCouranteRequest extends FormRequest
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
            'message_porter'=>'nullable',
            'mise_en_valeur'=>'required',
            'avis_main_courante'=>'required',
            'date_bornage'=>'required',
            'observation_main_courante'=>'nullable',
            's_c'=>'nullable',
        ];
    }
}
