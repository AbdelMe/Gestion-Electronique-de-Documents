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
        if(!empty($this->withoutRol)){
            $users = User::withoutRole($this->withoutRol)->get();
        }
    
        if (!empty($this->selected_entreprise)) {
            $users = User::with('entreprise')
                ->where('entreprise_id', $this->selected_entreprise)
                ->get();
        }
        if (!empty($this->searchUser)) {
            $users = User::where('first_name', 'like', '%' . $this->searchUser . '%')
            ->orWhere('last_name', 'like', '%' . $this->searchUser . '%')
            ->get();        
        }
        $entreprises = Entreprise::all();
        $roles = Role::all();
        $entreprises = Entreprise::all();
        return view('livewire.search-user',compact('roles','entreprises','users'));
    }
}
