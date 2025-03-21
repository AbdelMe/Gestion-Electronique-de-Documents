<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Service extends Model
{
    protected $guarded = ['id'];
    public function Entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }
}
