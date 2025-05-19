<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SearchDocument extends Component
{
    use WithPagination;
    public string $search_docs = "";
    public string $filter_by = "";
    // public $documents;
    // public $docs = [];

    // public function mount()
    // {
    //     $this->documents = Document::with(['Dossier', 'TypeDocument'])->get();
    // }

    public function render()
    {
        $query = Document::query()->with(['Dossier', 'TypeDocument']);
                $userEntrepriseId = Auth::user()->entreprise_id;

        $query = Document::with(['dossier', 'typeDocument', 'RubriqueDocument'])
            ->whereHas('dossier', function ($q) use ($userEntrepriseId) {
                $q->where('entreprise_id', $userEntrepriseId);
            });

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

        $documents = $query->paginate(3);


        return view('livewire.search-document', [
            'documents' => $documents,
            // 'docs' => $this->docs
        ]);
    }
}