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
        
        if(strlen($this->search_doc) >= 2) {
            $docs = Document::with(['dossier', 'typeDocument'])
                ->where(function($query) {
                    $query->where('titre', 'LIKE', '%'.$this->search_doc.'%')
                          ->orWhereHas('dossier', function($q) {
                              $q->where('Dossier', 'LIKE', '%'.$this->search_doc.'%');
                          });
                })
                // ->limit(10)
                ->get();
        }

        return view('livewire.search-bar', [
            'docs' => $docs
        ]);
    }
}