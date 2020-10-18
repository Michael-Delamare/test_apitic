<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nom_classe', 'proprietes', 'armure', 'point_de_vie'
    ];

    public function specialisations() {
        return $this->hasOne('App\Models\Specialisation');
    }
}
