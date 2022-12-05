<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Client;
use App\Model\Facture;

class Agence extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom_agence',
        'departement',
        'ville',
    ];

    function clients(){

        return $this->hasMany(Client::class);

    }
    function factures(){
        return $this->hasMany(Facture::class);
    }
}
