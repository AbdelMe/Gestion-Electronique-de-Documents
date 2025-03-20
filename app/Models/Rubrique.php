<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    protected $guarded = ['id'];
    public function TypeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }

    public function TypeRubrique()
    {
        return $this->belongsTo(TypeRubrique::class , 'type_rubrique_id');
    }
}
