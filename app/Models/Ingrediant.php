<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediant extends Model
{
    use HasFactory;


    public function Repats(){

        return $this->belongsToMany(Repat::class, 'repat_ingrediants');
    }
    public function Ingrediants_Quantite(){

        return $this->belongsToMany(Ingrediants_Quantite::class, 'ingrediants_ingrediants_quantite');
    }
}
