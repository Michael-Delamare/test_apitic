<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Personnage;
use App\Models\Classe;
use App\Models\Specialisation;
use App\Http\Classes\Chasseur;
use App\Http\Classes\Guerrier;
use App\Http\Classes\Mage;
use App\Http\Classes\Pretre;
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
        $personnages = Personnage::with('specialisation')->get();
        $personnages = $this->donneeClasse($personnages);
        return view('accueil',[
            'personnages'=>$personnages,
        ]);

    }

    public static function couleurTom($personnage){
        if($personnage->proprietaire == 'Tom'){
            $Nstring = str_split ($personnage->pseudo,1);
            foreach ($Nstring as $value) {
                $str= "rgb(".rand(0,200).",".rand(0,200).",".rand(0,200).")";
                echo "<b style='color:".$str.";'>".$value."</b>";
        }}
        else{
            echo "<p>".$personnage->pseudo."</p>";
        }
    }

    public function donneeClasse($personnages){
        foreach ($personnages as $personnage) {
            $classe = $personnage->specialisation->classe->nom_classe;
            $chemin = "App\\Http\\Classes\\".$classe;
            $donneeClasse = new $chemin($personnage);
            $personnage->donneeClasse = $donneeClasse;
        }
        return $personnages;
    }

    public function tpc(){
        $personnages = Personnage::with('specialisation')->join('specialisations', 'personnages.specialisation_id', '=', 'specialisations.id')->orderBy('classe_id')->get();
        $personnages = $this->donneeClasse($personnages);
        return view('accueil',['personnages'=>$personnages]);
    }

    public function tps(){
        $personnages = Personnage::with('specialisation')->orderBy('specialisation_id')->get();
        $personnages = $this->donneeClasse($personnages);
        return view('accueil',['personnages'=>$personnages]);
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
        $personnage->specialisation_id = $request->specialisation_id;
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
    public function edit($id)
    {
        $personnage = Personnage::find($id);
        $classe = Classe::get();
        $specialisations = Specialisation::get();
        return view('edit',["personnages"=>$personnage,"specialisations"=>$specialisations,"classes"=>$classe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personnage = Personnage::findOrFail($id);
        $personnage->pseudo = $request->pseudo;
        $personnage->race = $request->race;
        $personnage->proprietaire = $request->proprietaire;
        $personnage->specialisation_id = $request->specialisation_id;
        $personnage->save();
        return redirect()->route('personnage.index');
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
