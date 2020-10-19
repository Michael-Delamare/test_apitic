<?php
namespace App\Http\Classes;
class Chasseur {
    public $pseudo;
    public $race;
    public $specialisation;
    public $couleur;
    public $icone;

    public function __construct($personnage){
        $this->personnage = $personnage;
        $this->pseudo = $personnage->pseudo;
        $this->race = $personnage->race;
        $this->specialisation = $personnage->specialisation->nom_specialisation;
        $this->couleur = "green";
    }

    public function hurlement_de_la_bete(){
        return "Je suis un chasseur avec la spécialisation".$this->specialisation;
    }
    public function detail(){
        return "Je suis un Chasseur et mon coup préféré est Hurlement de la Bête";
    }

}
