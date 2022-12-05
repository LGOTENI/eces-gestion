<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Client;


class Compteur extends Model
{
    use HasFactory;

    protected $fillable= [
        'index_ancien',
        'index_nouveau',
        'puissance',
        'nbre_mois',
        'prix_unitaire',
        'installer',
    ];

    function clients() {
        return $this->belongsTo(Client::class);
    }
}
