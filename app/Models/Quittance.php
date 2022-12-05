<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facture;

class Quittance extends Model
{
    use HasFactory;
    protected $fillable= [
        'montant',
        'redevencer',
    ];

    function factures(){
        return $this->belongsTo(Quittance::class);
    }

}
