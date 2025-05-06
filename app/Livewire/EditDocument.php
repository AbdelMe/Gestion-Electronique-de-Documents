<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Entreprise;
use App\Models\Etat;
use App\Models\Rubrique;
use App\Models\TypeDocument;
use Livewire\Component;

class EditDocument extends Component
{
    public $document;
    public $typeDocuments;
    public $dossiers;
    public string $selected_type_doc = "" ;

    public function render()
    {
        $document = $this->document;
        $typeDocuments = $this->typeDocuments;
        $dossiers = $this->dossiers;
        $etats = Etat::all();
        $classes = Classe::all();


        $rebrique = Rubrique::with('typeRubrique')
        ->where('type_document_id', $this->selected_type_doc)
        ->get();

        return view('livewire.edit-document', compact('rebrique','document','typeDocuments','dossiers','etats','classes'));
    }
}
