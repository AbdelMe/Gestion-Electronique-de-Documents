<?php

namespace App\Livewire;

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
        $rebrique = DB::table('rubriques')->where('type_document_id', $this->selected_type)->get();
        // dd($this->selected_type);
        return view('livewire.display-rubriques',compact('typeDocuments','rebrique'));
    }
}
