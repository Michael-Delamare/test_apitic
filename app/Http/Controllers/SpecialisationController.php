<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Specialisation;
use Illuminate\Http\Request;

class SpecialisationController extends Controller
{

    /**
     * Récupère l'id de la classe par la requête et va chercher les corespondances en base de données dans la table spécialisation
     *
     * @param Request $request
     * @return void
     */
    public function changeSelecteur(Request $request){
            $specialisation = Specialisation::where('classe_id',$request->data)->get();
            return ['specialisation'=>$specialisation];
    }
}
