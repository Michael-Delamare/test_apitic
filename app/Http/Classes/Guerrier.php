<?php

class Guerrier {
    public $pseudo;
    public $race;
    public $specialisation;

    public function __construct($personnage){
        $this->personnage = $personnage;
        $this->pseudo = $personnage->pseudo;
        $this->race = $personnage->race;
        $this->specialisation = $personnage->specialisation->nom_specialisation;
    }

    public function cri_de_guerre(){
        return "Je suis un guerrier avec la spécialisation".$this->specialisation;
    }

}
