<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facture;

class Taxe extends Model
{
    use HasFactory;
    protected $fillable= [
        'timbre_elec',
        'ca',
        'droit_consommation',
        'rav',
        'attribuer',
    ];

    function factures(){
        return $this->belongsTo(Fature::class);
    }

}
