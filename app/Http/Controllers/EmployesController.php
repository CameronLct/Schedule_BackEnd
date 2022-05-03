<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use App\Models\Horaires;
use Illuminate\Http\Request;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employes::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employes = Employes::create($request->all());
        $horaires = new Horaires();
        $horaires->lundi = $request->lundi["value"];          
        $horaires->mardi = $request->mardi["value"];          
        $horaires->mercredi = $request->mercredi["value"];          
        $horaires->jeudi = $request->jeudi["value"];          
        $horaires->vendredi = $request->vendredi["value"];
        $horaires->id_employes = $employes->id;
        $horaires->save();

        return "employee has been created";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Employes::find($id);
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
        $employe = Employes::find($id);

        $employe->adresse_mail = $request->input('adresse_mail');
        $employe->nom = $request->input('nom');
        $employe->prenom = $request->input('prenom');
        $employe->save();

        return "Employee" . $employe->nom . "with id" . $employe->id . "has been updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employes::find($id);
        $employe->delete();

        return "Employee" . $employe->nom . "with id" . $employe->id . "has been deleted";
    }
}
