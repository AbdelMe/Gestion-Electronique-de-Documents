<?php

namespace App\Livewire;

use App\Models\Entreprise;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class SearchUser extends Component
{
    public $selected_entreprise = "";
    public $withRol = "";
    public $withoutRol = "";
    public $searchUser = "";
    public function render()
    {
        $users = [];
        if(!empty($this->withRol)){
            $users = User::role($this->withRol)->get();
            // dd($users);
        }
        $entreprises = Entreprise::all();
        $roles = Role::all();
        $entreprises = Entreprise::all();
        return view('livewire.search-user',compact('roles','entreprises','users'));
    }
}
