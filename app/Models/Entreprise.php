<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entreprise extends Model
{
    // protected $fillable = [
    //     'RaisonSocial',
    //     'NomClient',
    //     'Adresse',
    //     'Ville',
    //     'Tel',
    //     'Fax',
    //     'Email',
    //     'TP',
    //     'RegistreCommerce',
    //     'IdentificationFiscale',
    //     'CNSS',
    //     'ICE',
    //     'Observation'
    // ];

    protected $guarded = ['id'];

}
