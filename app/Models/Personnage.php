<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnage extends Model
{
    protected $fillable = [
        'pseudo', 'race', 'armure', 'proprietaire', 'specialisation_id'
    ];

    public function specialisation() {
        return $this->hasOne('App\Models\Specialisation');
    }
}
