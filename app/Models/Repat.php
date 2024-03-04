<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repat extends Model
{
    use HasFactory;


    protected $fillable=[
        'nom',
        'description'
       
    ];

    public function Seances(){

        return $this->hasMany(Seance::class);
    }
    public function Ingrediants(){

        return $this->belongsToMany(Ingrediant::class, 'repat_ingrediants');
    }
}
