<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = ['id'];
    public function TypeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }
    public function Dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
