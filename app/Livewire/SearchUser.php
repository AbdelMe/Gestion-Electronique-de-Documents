<?php

namespace App\Livewire;

use App\Models\Entreprise;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class SearchUser extends Component
{

    public function render()
    {
        return view('livewire.search-user');
    }
}
