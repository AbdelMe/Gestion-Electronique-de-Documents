<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;

class SearchDocument extends Component
{
    public string $search_docs = "";
    public string $filter_by = "";
    public $documents;
    public $docs = [];

    public function mount()
    {
        $this->documents = Document::with(['Dossier', 'TypeDocument'])->get();
    }

    public function render()
    {
        $query = Document::query()->with(['Dossier', 'TypeDocument']);

        // Search functionality
        if (strlen($this->search_docs) >= 2) {
            $searchTerm = '%'.$this->search_docs.'%';
            
            $query->where(function($q) use ($searchTerm) {
                $q->where('titre', 'LIKE', $searchTerm)
                  ->orWhereHas('Dossier', function($q) use ($searchTerm) {
                      $q->where('Dossier', 'LIKE', $searchTerm);
                  })
                  ->orWhereHas('TypeDocument', function($q) use ($searchTerm) {
                      $q->where('TypeDocument', 'LIKE', $searchTerm);
                  });
            });
        }

        // Sorting functionality
        switch ($this->filter_by) {
            case 'date_recent':
                $query->orderByDesc('Date');
                break;
            case 'date_ancien':
                $query->orderBy('Date');
                break;
            case 'name_asc':
                $query->orderBy('titre');
                break;
            case 'name_desc':
                $query->orderByDesc('titre');
                break;
        }

        $this->docs = $query->get();


        return view('livewire.search-document', [
            'documents' => $this->docs,
            'docs' => $this->docs
        ]);
    }
}