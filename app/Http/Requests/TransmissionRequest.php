<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransmissionRequest extends FormRequest
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
            'nouveau_dossier_id'=>'required',
            'date_transmission'=>'required|date',
            'motif'=>'required|string',
            'statut'=>'required|string',
            'date_reception'=>'date|nullable',
        ];
    }
}
