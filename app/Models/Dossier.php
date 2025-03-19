<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dossier extends Model
{
    protected $fillable = ['service_id', 'dossier', 'année'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}