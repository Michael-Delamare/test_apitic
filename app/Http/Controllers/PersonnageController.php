<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Personnage;
use App\Models\Classe;
use App\Models\Specialisation;
use Illuminate\Http\Request;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnage = Personnage::with('specialisation')->get();
        return view('accueil',[
            'personnages'=>$personnage,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnage = Personnage::get();
        $classe = Classe::get();
        $specialisation = Specialisation::get();
        return view('create',['personnages'=>$personnage,'classes'=>$classe,'specialisations'=>$specialisation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personnage = new personnage;
        $personnage->pseudo = $request->pseudo;
        $personnage->race = $request->race;
        $personnage->proprietaire = $request->proprietaire;
        $personnage->specialisation_id = $request->nom_specialisation;
        $personnage->save();
        return redirect()->route('personnage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function show(Personnage $personnage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnage $personnage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnage $personnage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personnage = Personnage::find($id);
        $personnage->delete();
        return redirect()->route('personnage.index');
    }
}
