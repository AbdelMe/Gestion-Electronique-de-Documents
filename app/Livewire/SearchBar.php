<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchBar extends Component
{
    public string $search_doc = "";
    public function render()
    {
        // $docs = [];
        // $query = Document::with(['dossier', 'typeDocument', 'RubriqueDocument'])->whereHas('dossier', function ($q) {
        //     $q->where('entreprise_id', Auth::user()->entreprise_id);
        // });
        // if (strlen($this->search_doc) >= 2) {
        //     $docs = $query
        //         ->where(function ($query) {
        //             $query->where('titre', 'LIKE', '%' . $this->search_doc . '%')
        //                 ->orWhereHas('dossier', function ($q) {
        //                     $q->where('Dossier', 'LIKE', '%' . $this->search_doc . '%')
        //                         ->orWhereHas('entreprise', function ($q) {
        //                             $q->where('NomClient', 'LIKE', '%' . $this->search_doc . '%');
        //                         });
        //                 })->orWhereHas('Etat', function ($q) {
        //                     $q->where('etat', 'LIKE', '%' . $this->search_doc . '%');
        //                 })->orWhereHas('classe', function ($q) {
        //                     $q->where('classe', 'LIKE', '%' . $this->search_doc . '%');
        //                 })->orWhereHas('TypeDocument', function ($q) {
        //                     $q->where('TypeDocument', 'LIKE', '%' . $this->search_doc . '%');
        //                 })->orWhereHas('RubriqueDocument', function ($q) {
        //                     $q->where('valeur', 'LIKE', '%' . $this->search_doc . '%')
        //                         ->orWhereHas('Rubrique', function ($q) {
        //                             $q->where('Rubrique', 'LIKE', '%' . $this->search_doc . '%'); // Adjust 'name' to your RubriqueDocument field
        //                         });
        //                 });
        //         })->orWhere(function ($query) {
        //             $query->where('metadata', 'LIKE', '%' . $this->search_doc . '%');
        //         })->orWhere(function ($query) {
        //             $query->where('tag', 'LIKE', '%' . $this->search_doc . '%');
        //         })->orWhere(function ($query) {
        //             $query->where('CheminDocument', 'LIKE', '%' . $this->search_doc . '%');
        //         })
        //         // ->limit(10)
        //         ->get();
        // }

        $docs = [];

        if (strlen($this->search_doc) >= 2) {
            $search = '%' . $this->search_doc . '%';

            $query = Document::with(['dossier', 'typeDocument', 'RubriqueDocument']);

            if (auth()->user()->is_admin != 1) {
                $query->whereHas('dossier', function ($q) {
                    $q->where('entreprise_id', auth()->user()->entreprise_id);
                });
            }

            $docs = $query->where(function ($query) use ($search) {
                $query->where('titre', 'LIKE', $search)
                    ->orWhere('metadata', 'LIKE', $search)
                    ->orWhere('tag', 'LIKE', $search)
                    ->orWhere('CheminDocument', 'LIKE', $search)
                    ->orWhereHas('dossier', function ($q) use ($search) {
                        $q->where('Dossier', 'LIKE', $search)
                            ->orWhereHas('entreprise', function ($q) use ($search) {
                                $q->where('NomClient', 'LIKE', $search);
                            });
                    })
                    ->orWhereHas('Etat', function ($q) use ($search) {
                        $q->where('etat', 'LIKE', $search);
                    })
                    ->orWhereHas('classe', function ($q) use ($search) {
                        $q->where('classe', 'LIKE', $search);
                    })
                    ->orWhereHas('TypeDocument', function ($q) use ($search) {
                        $q->where('TypeDocument', 'LIKE', $search);
                    })
                    ->orWhereHas('RubriqueDocument', function ($q) use ($search) {
                        $q->where('valeur', 'LIKE', $search)
                            ->orWhereHas('Rubrique', function ($q) use ($search) {
                                $q->where('Rubrique', 'LIKE', $search);
                            });
                    });
            })
                ->get();
        }

        return view('livewire.search-bar', [
            'docs' => $docs
        ]);
    }
}
