<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Facture;
use App\Model\Agence;
use App\Model\Compteur;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'adresse',
        'nom_cli',
        'branchement',
        'enregistrer'
    ];

    function agences(){
        return $this->belongsTo(Agence::class);
    }

    function compteurs(){
        return $this->hasMany(Compteur::class);
    }

    function factures(){
        return $this->hasMany(Facture::Class);
    }
}
