<?php

namespace App\Livewire;

use App\Models\Entreprise;
use App\Models\User;
use Livewire\Component;

class GetUsersAccordingToTheCompany extends Component
{
    public $selected_company = "";

    public function render()
    {
        $users = [];
    
        if (!empty($this->selected_company)) {
            $users = User::with('entreprise')
                ->where('entreprise_id', $this->selected_company)
                ->get();
        }
        $entreprises = Entreprise::all();
    
        return view('livewire.get-users-according-to-the-company', compact('users', 'entreprises'));
    }
    
}
