<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeRubrique extends Model
{
    protected $fillable = [
        'type_rubrique',
        'taille_rubrique',
        'date',
        'bookeane',
        'bagour',
        'hauteur'
    ];

    public function rubriques(): HasMany
    {
        return $this->hasMany(Rubrique::class);
    }
}