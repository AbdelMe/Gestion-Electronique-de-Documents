<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            'public',
            'confidential',
            'liternal'
        ];

        foreach($classes as $class){
            Classe::firstOrCreate([
                'classe' => $class,
            ]);
        }
    }
}
