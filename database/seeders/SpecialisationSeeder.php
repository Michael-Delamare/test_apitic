<?php

namespace Database\Seeders;

use App\Models\Specialisation;
use Illuminate\Database\Seeder;

class SpecialisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialisation::create([
            'nom_specialisation'=>'Arme',
            'classe_id'=>'1',
            'icone'=>'Arme.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Fureur',
            'classe_id'=>'1',
            'icone'=>'Fureur.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Protection',
            'classe_id'=>'1',
            'icone'=>'Protection.png'
        ]);

        Specialisation::create([
            'nom_specialisation'=>'Givre',
            'classe_id'=>'2',
            'icone'=>'Givre.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Feu',
            'classe_id'=>'2',
            'icone'=>'Feu.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Arcane',
            'classe_id'=>'2',
            'icone'=>'Arcane.png'
        ]);


        Specialisation::create([
            'nom_specialisation'=>'Sacré',
            'classe_id'=>'3',
            'icone'=>'Sacre.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Discipline',
            'classe_id'=>'3',
            'icone'=>'Discipline.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Ombre',
            'classe_id'=>'3',
            'icone'=>'Ombre.png'
        ]);

        Specialisation::create([
            'nom_specialisation'=>'Précision',
            'classe_id'=>'4',
            'icone'=>'Precision.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Maîtrise des Bêtes',
            'classe_id'=>'4',
            'icone'=>'Maitrise_des_betes.png'
        ]);
        Specialisation::create([
            'nom_specialisation'=>'Survie',
            'classe_id'=>'4',
            'icone'=>'Survie.png'
        ]);
    }
}
