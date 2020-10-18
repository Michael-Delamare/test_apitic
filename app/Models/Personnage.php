<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnage extends Model
{
    protected $fillable = [
        'pseudo', 'race', 'proprietaire', 'specialisation_id'
    ];

    //protected $guarded = [];

    public function specialisation() {
        return $this->belongsTo('App\Models\Specialisation');
    }
}
