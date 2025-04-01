<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDossierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Changed to true to allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Dossier' => 'required|string|max:255',
            'Annee' => 'required|numeric|min:2000|max:2100',
            'description' => 'required|string',
            'entreprise_id' => 'required|exists:entreprises,id',
        ];
    }
}

