<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Agence;
use App\Models\Compteur;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        return view('liste', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Agence::first()->id;

        $this->validate($request, [
            'nom_cli' => 'bail|required|string|max:255',
            'prenom' => 'bail|required|string|max:255',
            'adresse' => 'bail|required|string',
            'branchement' => 'bail|required|string',
        ]);
        Client::create([
            'nom_cli' => $request->nom_cli,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'branchement' => $request->branchement,
            'enregistrer'=>$data
        ]);

        return redirect(route('index'))->with('success', 'Le client a été bien enregistré, vous pouvez ajouter un nouveau client si nécessaire.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compteur = Compteur::where('installer' , $id)->first();
        $client= Client::where('id',$id)->first();
        return view('profil', compact('client'), compact('compteur'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
