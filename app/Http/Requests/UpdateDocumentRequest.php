<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'type_document_id' => 'required|exists:type_documents,id',
            'dossier_id' => 'required|exists:dossiers,id',
            'LibelleDocument' => 'required|string|max:255',
            'CheminDocument' => 'required|string|max:255',
            'OCR' => 'required|string|max:255',
            'Cote' => 'required|string|max:255',
            'Index' => 'required|date',
            'Supprimer' => 'required|boolean',
            'EnCoursSuppression' => 'required|boolean',
            'rubriques' => 'required|array',
        ];
    }
}
