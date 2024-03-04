<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingrediant;

class Ingrediants_Quantite extends Model
{
    use HasFactory;

    protected $fillable =[
       
        'quantite'
    ];

    public function Ingrediants(){

        return $this->belongsToMany(Ingrediant::class, 'ingrediants_ingrediants_quantite');
    }
}
