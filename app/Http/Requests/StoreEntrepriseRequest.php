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
            // 'RaisonSocial' => 'required|string|max:255',
            'NomClient' => 'required|string|max:255',
            // 'Adresse' => 'required|string|max:255',
            // 'Ville' => 'required|string|max:255',
            // 'Tel' => 'required|string|max:255',
            // 'Fax' => 'required|string|max:255',
            // 'Email' => 'required|string|email|max:255',
            // 'TP' => 'required|string|max:255',
            // 'RegistreCommerce' => 'required|string|max:255',
            // 'IdentificationFiscale' => 'required|string|max:255',
            // 'CNSS' => 'required|string|max:255',
            // 'ICE' => 'required|string|max:255',
            // 'Observation' => 'string|max:255',
        ];
    }
}
