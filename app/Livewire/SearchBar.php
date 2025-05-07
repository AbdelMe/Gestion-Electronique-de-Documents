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
        if (strlen($this->search_doc) >= 2) {
            $docs = Document::with(['dossier', 'typeDocument', 'RubriqueDocument'])
                ->where(function ($query) {
                    $query->where('titre', 'LIKE', '%' . $this->search_doc . '%')
                        ->orWhereHas('dossier', function ($q) {
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
                                $q->where('Rubrique', 'LIKE', '%' . $this->search_doc . '%'); // Adjust 'name' to your RubriqueDocument field
                            });
                        });
                })->orWhere(function ($query) {
                    $query->where('metadata', 'LIKE', '%' . $this->search_doc . '%');
                })->orWhere(function ($query) {
                    $query->where('tag', 'LIKE', '%' . $this->search_doc . '%');
                })->orWhere(function ($query) {
                    $query->where('CheminDocument', 'LIKE', '%' . $this->search_doc . '%');
                })
                // ->limit(10)
                ->get();
        }
        return view('livewire.search-bar', [
            'docs' => $docs
        ]);
    }
}
