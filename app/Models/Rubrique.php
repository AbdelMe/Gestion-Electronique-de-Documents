<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rubrique extends Model
{
    protected $fillable = [
        'type_rubrique_id', 'type_document_id', 
        'rubrique', 'valleur', 'obligatoire'
    ];

    public function typeRubrique(): BelongsTo
    {
        return $this->belongsTo(TypeRubrique::class);
    }

    public function typeDocument(): BelongsTo
    {
        return $this->belongsTo(TypeDocument::class);
    }
}
