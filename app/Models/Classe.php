<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $guarded = ['id'];
    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }
}
