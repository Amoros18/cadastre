<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
            'numero_dossier' =>'required|string',
            'longitude0'=>'required|string',
            'latitude0'=>'required|string',
            'longitude1'=>'nullable|string',
            'latitude1'=>'nullable|string',
            'longitude2'=>'nullable|string',
            'latitude2'=>'nullable|string',
            'longitude3'=>'nullable|string',
            'latitude3'=>'nullable|string',
            'longitude4'=>'nullable|string',
            'latitude4'=>'nullable|string',
            'longitude5'=>'nullable|string',
            'latitude5'=>'nullable|string',
            'longitude6'=>'nullable|string',
            'latitude6'=>'nullable|string',
            'longitude7'=>'nullable|string',
            'latitude7'=>'nullable|string',
            'longitude8'=>'nullable|string',
            'latitude8'=>'nullable|string',
            'longitude9'=>'nullable|string',
            'latitude9'=>'nullable|string',
            'longitude10'=>'nullable|string',
            'latitude10'=>'nullable|string',
            'longitude11'=>'nullable|string',
            'latitude11'=>'nullable|string',
            'longitude12'=>'nullable|string',
            'latitude12'=>'nullable|string',
            'longitude13'=>'nullable|string',
            'latitude13'=>'nullable|string',
            'longitude14'=>'nullable|string',
            'latitude14'=>'nullable|string',
        ];
    }
}
