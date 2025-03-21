<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeUtilisateur extends Model
{
    protected $fillable = ['type_utilisateur', 'bloque', 'admin'];

    public function utilisateurs(): HasMany
    {
        return $this->hasMany(Utilisateur::class);
    }
}