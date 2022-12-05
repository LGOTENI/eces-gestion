<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Agence;
use App\Models\Quittance;
use App\Models\Taxe;

class Facture extends Model
{
    use HasFactory;
    protected $fillable= [
        'periode',
        'ref_paiment',
        'delai_paiment',
        'payer',
        'delivrer',
    ];

    function clients(){
        return $this->belongsTo(Client::class);
    }

    function agences(){
        return $this->belongsTo(Agence::class);
    }

    function quittances(){
        return $this->hasMany(Facture::class);
    }
    function taxes(){
        return $this->hasMany(Taxe::class);
    }
}
