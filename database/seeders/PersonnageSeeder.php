<?php

namespace Database\Seeders;

use App\Models\Personnage;
use Illuminate\Database\Seeder;

class PersonnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personnage::create([
            'pseudo'=>'Tominator',
            'race'=>'Orc',
            'proprietaire'=>'Tom',
            'specialisation_id'=>'1',
        ]);
        Personnage::create([
            'pseudo'=>'Mickaladium',
            'race'=>'Humain',
            'proprietaire'=>'Michael',
            'specialisation_id'=>'5',
        ]);
        Personnage::create([
            'pseudo'=>'Tomonitor',
            'race'=>'Nain',
            'proprietaire'=>'Tom',
            'specialisation_id'=>'11',
        ]);
        Personnage::create([
            'pseudo'=>'Micka',
            'race'=>'Elfe',
            'proprietaire'=>'Michael',
            'specialisation_id'=>'8',
        ]);
    }
}
