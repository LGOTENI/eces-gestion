<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compteur;


class CompteurController extends Controller
{
    public function store(Request $request, $id){

        $this->validate($request, [
            'index_ancien' => 'bail|required',
            'index_nouveau' => 'bail|required',
            'puissance' => 'bail|required',
            'nbre_mois' => 'bail|required',
            'prix_unitaire' => 'bail|required',
        ]);

        Compteur::create([
            'index_ancien' => $request->index_ancien,
            'index_nouveau' => $request->index_nouveau,
            'puissance' => $request->puissance,
            'nbre_mois' => $request->nbre_mois,
            'prix_unitaire' => $request->prix_unitaire,
            'installer'=>$id
        ]);

        return redirect(route('client.show', $id))->with('success', 'Les informations relatives au compteur ont été bien enregistrées. Cliquer sur liste compteur pour plus de details');
    }

    public function show($id)
    {
        $factures = Compteur::where('installer', $id)->orderBy('id', 'desc')->get();
        $retour = $id;
        return view('listeCompteur', compact('factures'), compact('retour'));
    }

    public function delete($id, $retour)
    {
        Compteur::where('id', $id)->delete();
        return redirect(route("list-compteur", $retour))->with('success', "Données supprimer avec success");
    }
}
