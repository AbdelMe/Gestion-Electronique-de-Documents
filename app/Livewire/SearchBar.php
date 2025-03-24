<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchBar extends Component
{
    public string $search_doc = "";

    public function render()
    {
        $docs = DB::table('documents')->where('LibelleDocument',$this->search_doc)->get();
        return view('livewire.search-bar',compact('docs'));
    }
}
