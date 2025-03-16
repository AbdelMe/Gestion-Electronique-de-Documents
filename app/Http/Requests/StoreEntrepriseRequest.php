<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrepriseRequest extends FormRequest
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
            'RaisonSocial' => 'required|string|max:255',
            'NomClient' => 'required|string|max:255',
            'Adresse' => 'required|string|max:255',
            'Ville' => 'string|max:255',
            'Tel' => 'string|max:255',
            'Fax' => 'string|max:255',
            'Email' => 'string|email|max:255',
            'TP' => 'string|max:255',
            'RegistreCommerce' => 'string|max:255',
            'IdentificationFiscale' => 'string|max:255',
            'CNSS' => 'string|max:255',
            'ICE' => 'string|max:255',
            'Observation' => 'string|max:255',
        ];
    }
}
