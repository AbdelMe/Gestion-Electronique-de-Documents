<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
