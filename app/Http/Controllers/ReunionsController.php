<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use App\Models\EmployesReunions;
use App\Models\Horaires;
use App\Models\Reunions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReunionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reunions::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO Automation
        //beginning of reflection for the automation
        /*$date = Carbon::now();

        $datefind = null;

        while($datefind != null)
        {
            if ($date->getDays() == "Friday" && $date->gt(new Carbon('16:00:00')))
            {
                $date->addHours(63);
            }

            foreach ($request->employes as $employetmp)
            {
                $employe = Employes::find($employetmp["value"]);

                $horaires = $employe->horaire();
            }
        }*/

        $reunion = Reunions::create($request->all());


        foreach ($request->employes as $employe) {
            EmployesReunions::create([
                "id_employes" => $employe["value"],
                "id_reunions" => $reunion->id
            ]);
        }

        return "Meeting has been created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reunions  $reunions
     * @return \Illuminate\Http\Response
     */
    public function show(Reunions $reunions)
    {
        return $reunions;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reunions  $reunion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reunions $reunion)
    {
        $reunion->nom = $request->input('nom');
        $reunion->date_heure = $request->input('date_heure');
        $reunion->save();

        return "Meeting" . $reunion->nom . "with id" . $reunion->id . "has been updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reunions  $reunion$
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reunions $reunion)
    {
        $reunion->delete();

        return "Meeting" . $reunion->nom . "with id" . $reunion->id . "has been deleted";
    }

    //collects all employees from a meeting
    public function getEmployesByReunions($id_reunions)
    {
        $id_employes = EmployesReunions::where("id_reunions", $id_reunions)->get();
        $employes = [];

        foreach ($id_employes as $id_employe) {
            array_push($employes, Employes::find($id_employe));
        }

        return $employes;
    }
}
