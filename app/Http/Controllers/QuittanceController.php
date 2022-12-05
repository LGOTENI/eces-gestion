<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quittance;
class QuittanceController extends Controller
{
    // Function store for create quittance

    public function index($id,$idFacture){
        return view('quittance', compact('id'), compact('idFacture'));
    }
    public function store(Request $request, $id, $id2){
        $this->validate($request, [
            'montant' => 'bail|required',
        ]);
        Quittance::create([
            'montant' => $request->montant,
            'redevencer' => $id
        ]);
        return redirect(route('list-facture', $id2))->with('success', 'Les informations relatives à la quittance ont été bien enregistrées. Cliquer sur liste quittance pour plus de details');
    }
    public function show($idFacture, $retour)
    {
        $factures = Quittance::where('redevencer', $idFacture)->orderBy('id', 'desc')->get();
        return view('listeQuittance', compact('factures'), compact('retour'));
    }

    public function delete($id, $retour, $redevencer){
        Quittance::where('id', $id)->delete();
        return redirect(route("list-quittance", [$redevencer, $retour]))->with('success', "Données supprimer avec success");
    }
}
