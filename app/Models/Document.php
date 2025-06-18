<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fill = ['id'];
    public function TypeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }
    public function Dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
    public function Etat()
    {
        return $this->belongsTo(Etat::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function RubriqueDocument()
    {
        return $this->hasMany(RubriqueDocument::class);
    }
    public function versions()
    {
        return $this->hasMany(Version::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}