<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etats = [
            "Draft" => "yellow",
            // "Pending Review",
            // "Under Review",
            "Approved" => "green",
            "Rejected" => "red",
            "Final" => "gray",
            // "Published" => "",
            // "Archived" => "",
            // "Canceled" => ""
        ];

        foreach($etats as $etat => $color){
            Etat::firstOrCreate(["etat" => $etat , "color" => $color]);
        }
    }
}
