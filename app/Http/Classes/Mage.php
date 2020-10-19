<?php
namespace App\Http\Classes;
class Mage {
    public $pseudo;
    public $race;
    public $specialisation;
    public $couleur;
    public function __construct($personnage){
        $this->personnage = $personnage;
        $this->pseudo = $personnage->pseudo;
        $this->race = $personnage->race;
        $this->specialisation = $personnage->specialisation->nom_specialisation;
        $this->couleur = "blue";
    }

    public function murmure_de_magie(){
        return "Je suis un mage avec la spécialisation".$this->specialisation;
    }
    public function detail(){
        return "Je suis un Mage et mon sort préféré est Murmure de Magie";
    }

}
