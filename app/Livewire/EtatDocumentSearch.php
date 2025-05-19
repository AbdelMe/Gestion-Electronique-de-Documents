<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\Entreprise;
use App\Models\Etat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class EtatDocumentSearch extends Component
{
    use WithPagination;
    public string $search_doc = "";


    public function render()
    {
        // $query = Document::with(['dossier', 'typeDocument', 'RubriqueDocument']);
        $userEntrepriseId = Auth::user()->entreprise_id;

        $query = Document::with(['dossier', 'typeDocument', 'RubriqueDocument'])
            ->whereHas('dossier', function ($q) use ($userEntrepriseId) {
                $q->where('entreprise_id', $userEntrepriseId);
            });
        if (strlen($this->search_doc) >= 2) {
            $query->where(function ($q) {
                $q->where('titre', 'LIKE', '%' . $this->search_doc . '%')->orWhereHas('dossier', function ($q) {
                    $q->where('Dossier', 'LIKE', '%' . $this->search_doc . '%')
                        ->orWhereHas('entreprise', function ($q) {
                            $q->where('NomClient', 'LIKE', '%' . $this->search_doc . '%');
                        });
                })->orWhereHas('Etat', function ($q) {
                    $q->where('etat', 'LIKE', '%' . $this->search_doc . '%');
                })->orWhereHas('classe', function ($q) {
                    $q->where('classe', 'LIKE', '%' . $this->search_doc . '%');
                })->orWhereHas('TypeDocument', function ($q) {
                    $q->where('TypeDocument', 'LIKE', '%' . $this->search_doc . '%');
                })->orWhereHas('RubriqueDocument', function ($q) {
                    $q->where('valeur', 'LIKE', '%' . $this->search_doc . '%')
                        ->orWhereHas('Rubrique', function ($q) {
                            $q->where('Rubrique', 'LIKE', '%' . $this->search_doc . '%');
                        });
                })
                    ->orWhere('metadata', 'LIKE', '%' . $this->search_doc . '%')
                    ->orWhere('tag', 'LIKE', '%' . $this->search_doc . '%')
                    ->orWhere('CheminDocument', 'LIKE', '%' . $this->search_doc . '%');
            });
        }

        $docs = $query->paginate(10);
        $entreprises = Entreprise::all();
        $etats = Etat::all();

        return view('livewire.etat-document-search', [
            'documents' => $docs,
            'entreprises' => $entreprises,
            'etats' => $etats,
        ]);
    }
}
