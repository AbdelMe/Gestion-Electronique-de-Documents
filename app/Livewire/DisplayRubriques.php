<?php

namespace App\Livewire;

use App\Models\Dossier;
use App\Models\Entreprise;
use App\Models\Rubrique;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DisplayRubriques extends Component
{
    public string $selected_type = "" ;
    public string $selected_entreprise= "" ;
    public string $selected_service = "" ;

    // public function selected($num)
    // {
    //     $this->selected_type = $num;
    // }
    public function render()
    {
        $typeDocuments = TypeDocument::all();
        // $dossiers = Dossier::all();
        $rebrique = Rubrique::with('typeRubrique')
            ->where('type_document_id', $this->selected_type)
            ->get();
        $entreprises = Entreprise::all();
        $services = DB::table('services')->where("entreprise_id" , $this->selected_entreprise)->get();
        $dossiers = DB::table('dossiers')->where("service_id" , $this->selected_service)->get();
        return view('livewire.display-rubriques',compact('typeDocuments','rebrique','dossiers','entreprises','services'));
    }
}
