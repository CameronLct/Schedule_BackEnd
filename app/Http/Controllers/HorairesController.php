<?php

namespace App\Http\Controllers;

use App\Models\Horaires;
use Illuminate\Http\Request;

class HorairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Horaires::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Horaires::create($request->all());

        return "Schedule has been created";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Horaires::find($id);
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
        $horaire = Horaires::find($id);

        $horaire->lundi = $request->input('lundi');
        $horaire->mardi = $request->input('mardi');
        $horaire->mercredi = $request->input('mercredi');
        $horaire->jeudi = $request->input('jeudi');
        $horaire->vendredi = $request->input('vendredi');
        $horaire->save();

        return "Schedule has been updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horaire = Horaires::find($id);
        $horaire->delete();

        return "Schedule has been deleted";
    }
}
