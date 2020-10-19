<?php
namespace App\Http\Classes;
class Guerrier {
    public $pseudo;
    public $race;
    public $specialisation;
    public $couleur;
    public function __construct($personnage){
        $this->personnage = $personnage;
        $this->pseudo = $personnage->pseudo;
        $this->race = $personnage->race;
        $this->specialisation = $personnage->specialisation->nom_specialisation;
        $this->couleur = "brown";
    }

    public function cri_de_guerre(){
        return "Je suis un guerrier avec la spécialisation".$this->specialisation;
    }
    public function detail(){
        return "Je suis un Guerrier et mon coup préféré est Cri de Guerre";
    }

}
