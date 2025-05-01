<?php

namespace App\Livewire;

use App\Models\Entreprise;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class SearchUser extends Component
{
    use WithPagination;

    public $selected_entreprise = "";
    public $withRol = "";
    public $withoutRol = "";
    public $searchUser = "";

    // public function updating($field)
    // {
    //     $this->resetPage();
    // }

    public function render()
    {
        $query = User::query()->with('entreprise');

        if (!empty($this->withRol)) {
            $query->role($this->withRol);
        }

        if (!empty($this->withoutRol)) {
            $query->withoutRole($this->withoutRol);
        }

        if (!empty($this->selected_entreprise)) {
            $query->where('entreprise_id', $this->selected_entreprise);
        }

        if (!empty($this->searchUser)) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', '%' . $this->searchUser . '%')
                  ->orWhere('last_name', 'like', '%' . $this->searchUser . '%');
            });
        }

        $users = $query->paginate(5);

        $entreprises = Entreprise::all();
        $roles = Role::all();

        return view('livewire.search-user', compact('users', 'entreprises', 'roles'));
    }
}
