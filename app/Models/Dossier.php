<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dossier extends Model
{
    protected $fillable = ['Dossier', 'Annee', 'entreprise_id','description'];

    public function entreprise(): BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }
    public function Document(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}