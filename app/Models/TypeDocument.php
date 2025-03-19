<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeDocument extends Model
{
    protected $fillable = ['type_document', 'dureevie'];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function rubriques(): HasMany
    {
        return $this->hasMany(Rubrique::class);
    }
}
