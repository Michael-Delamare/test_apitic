<?php
namespace App\Http\Classes;
use App\Personnage;
class Pretre {
    public $pseudo;
    public $race;
    public $specialisation;

    public function __construct($personnage){
        $this->personnage = $personnage;
        $this->pseudo = $personnage->pseudo;
        $this->race = $personnage->race;
        $this->specialisation = $personnage->specialisation->nom_specialisation;
    }

    public function hymne_divin(){
        return "Je suis un prêtre avec la spécialisation".$this->specialisation;
    }
    public function detail(){
        return "Je suis un Prêtre et mon soins préféré est Hymne Divin";
    }

}
