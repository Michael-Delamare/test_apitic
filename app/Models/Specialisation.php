<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    protected $fillable = [
        'nom_specialisation', 'classe_id',
    ];

    public function personnages() {
        return $this->belongsTo('App\Models\Personnage');
    }
    public function classes(){
        return $this->hasOne('App\Models\Classe');
    }
}
