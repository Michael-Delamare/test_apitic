<?php

class Mage {
    public $pseudo;
    public $race;
    public $specialisation;

    public function __construct($personnage){
        $this->personnage = $personnage;
        $this->pseudo = $personnage->pseudo;
        $this->race = $personnage->race;
        $this->specialisation = $personnage->specialisation->nom_specialisation;
    }

    public function murmure_de_magie(){
        return "Je suis un mage avec la spécialisation".$this->specialisation;
    }

}
