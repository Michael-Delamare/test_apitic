<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    protected $fillable = [
        'nom_specialisation', 'classe_id',
    ];

    protected $with = ['classe'];

    public function personnages() {
        return $this->hasOne('App\Models\Personnage');
    }
    public function classe(){
        return $this->belongsTo('App\Models\Classe');
    }
}
