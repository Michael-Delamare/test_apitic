<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classe::create([
            'nom_classe'=>'Guerrier',
            'armure'=>'métal',
            'point_de_vie'=>300,
        ]);
        Classe::create([
            'nom_classe'=>'Mage',
            'armure'=>'tissu',
            'point_de_vie'=>100,
        ]);
        Classe::create([
            'nom_classe'=>'Pretre',
            'armure'=>'cuir',
            'point_de_vie'=>200,
        ]);
        Classe::create([
            'nom_classe'=>'Chasseur',
            'armure'=>'cuir',
            'point_de_vie'=>200,
        ]);
    }
}
