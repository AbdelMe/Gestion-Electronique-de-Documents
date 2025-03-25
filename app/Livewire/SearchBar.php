<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;

class SearchBar extends Component
{
    public string $search_doc = "";

    public function render()
    {
        $docs = [];
        
        if(strlen($this->search_doc) >= 3) {
            $docs = Document::with(['dossier'])
                ->where('LibelleDocument', 'LIKE', '%'.$this->search_doc.'%')
                ->get();
        }

        return view('livewire.search-bar', compact('docs'));
    }
}