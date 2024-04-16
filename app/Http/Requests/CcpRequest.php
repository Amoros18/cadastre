<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CcpRequest extends FormRequest
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
            'echelle'=>'required',
            'dao'=>'required',
            'date_ccp'=>'nullable',
            'data'=>'nullable',
            //'point'=>'required',
            'longitude'=>'nullable',
            'latitude'=>'nullable',
            'superficie'=>'required',
            'numero_ccp'=>'required',
        ];
    }
}
