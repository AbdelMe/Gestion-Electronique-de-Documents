<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RubriqueDocument extends Model
{
    protected $guarded = ['id'];

    public function Rubrique()
    {
        return $this->belongsTo(Rubrique::class, 'rubrique_id');
    }
    public function Document()
    {
        return $this->belongsTo(Document::class);
    }
}
