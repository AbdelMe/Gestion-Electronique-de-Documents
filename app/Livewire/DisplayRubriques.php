<?php

namespace App\Livewire;

use App\Models\Dossier;
use App\Models\Rubrique;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DisplayRubriques extends Component
{
    public string $selected_type = "" ;

    // public function selected($num)
    // {
    //     $this->selected_type = $num;
    // }
    public function render()
    {
        $typeDocuments = TypeDocument::all();
        $dossiers = Dossier::all();
        $rebrique = Rubrique::with('typeRubrique')
            ->where('type_document_id', $this->selected_type)
            ->get();
        return view('livewire.display-rubriques',compact('typeDocuments','rebrique','dossiers'));
    }
}
