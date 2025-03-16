<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];
    public function Entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
