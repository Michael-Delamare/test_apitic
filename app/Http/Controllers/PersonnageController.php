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
     * Afficher la liste des personnages
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

    /**
     * Changer la couleur des pseudo des personnages appartenant au propriétaire Tom
     * Si autre propriétaire afficher les pseudo simplement
     *
     * @param [type] $personnage
     * @return void
     */
    public static function couleurPseudo($personnage){
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

    /**
     * Boucle permettant d'acceder aux données des classes du fichier Classes (classes des personnages)
     *
     * @param [type] $personnages
     * @return void
     */
    public function donneeClasse($personnages){
        foreach ($personnages as $personnage) {
            $classe = $personnage->specialisation->classe->nom_classe;
            $chemin = "App\\Http\\Classes\\".$classe;
            $donneeClasse = new $chemin($personnage);
            $personnage->donneeClasse = $donneeClasse;
        }
        return $personnages;
    }

    /**
     * Triage par Classe
     *
     * @return void
     */
    public function tpc(){
        $personnages = Personnage::with('specialisation')->join('specialisations', 'personnages.specialisation_id', '=', 'specialisations.id')->orderBy('classe_id')->get();
        $personnages = $this->donneeClasse($personnages);
        return view('accueil',['personnages'=>$personnages]);
    }

    /**
     * Triage par Spécialisation
     *
     * @return void
     */
    public function tps(){
        $personnages = Personnage::with('specialisation')->orderBy('specialisation_id')->get();
        $personnages = $this->donneeClasse($personnages);
        return view('accueil',['personnages'=>$personnages]);
    }

    /**
     * Renvoie la vue du formulaire de création d'un personnage
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
     * Insertion d'un personnage en base de données grâce aux données récupérées par la requête
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
     *  Renvoie la vue du formulaire de modification d'un personnage
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
     * Modification d'un personnage en base de données grâce aux données récupérées par la requête
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
     * Supprime un personnage
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
