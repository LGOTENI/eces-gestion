<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Client;

class FactureController extends Controller
{
    public function store(Request $request, $id){
        // To check client with id=$id
        $client= Client::where('id', $id)->first();
        // Validate request
        $this->validate($request, [
            'periode' => 'bail|required',
            'ref_paiment' => 'bail|required',
            'delai_paiment' => 'bail|required',
        ]);
        // To save facture
        Facture::create([
            'periode' => $request->periode,
            'ref_paiment' => $request->ref_paiment,
            'delai_paiment' => $request->delai_paiment,
            'payer' => $client->id,
            'delivrer'=>$client->enregistrer
        ]);
        return redirect(route('client.show', $id))->with('success', 'Les informations relatives à la facture ont été bien enregistrées. Cliquer sur liste facture pour plus de détails');
    }

    public function show($id){
        $factures = Facture::where('payer', $id)->orderBy('id', 'desc')->get();
        $retour = $id;

        return view('listeFacture', compact('factures'), compact('retour'));

    }

    public function delete($id, $retour)
    {
        Facture::where('id', $id)->delete();
        return redirect(route("list-facture", $retour))->with('success', "Données supprimer avec success");
    }
    public function destroy($id)
    {
        Client::where('id', $id)->delete();
        return redirect(route("index"))->with('success', "Données supprimer avec success");
    }
}
