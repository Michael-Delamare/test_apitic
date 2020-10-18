<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Specialisation;
use Illuminate\Http\Request;

class SpecialisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialisation = Specialisation::get();
        return view('accueil',[
            'specialisations'=>$specialisation,
        ]);
    }


    public function changeSelecteur(Request $request){
            $specialisation = Specialisation::where('classe_id',$request->data)->get();
            return ['specialisation'=>$specialisation];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialisation = Specialisation::get();
        return view('create',['specialisations'=>$specialisation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request -> validate([
            'nom_specialisation'=> 'required|min:3',
         ]);
         $specialisation = Specialisation::create($validatedData);
         $specialisation->save();
         return redirect()->route('personnage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialisation  $specialisation
     * @return \Illuminate\Http\Response
     */
    public function show(Specialisation $specialisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialisation  $specialisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialisation $specialisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialisation  $specialisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialisation $specialisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialisation  $specialisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialisation $specialisation)
    {
        //
    }
}
