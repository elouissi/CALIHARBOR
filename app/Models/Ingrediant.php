<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediant extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nom',
        'description',
        'unite'
    ];

    public function repats()
    {
        return $this->belongsToMany(Repat::class, 'repat_ingrediants')->withPivot('quantite');
    }

    public function ingrediants_quantite()
    {
        return $this->belongsToMany(Ingrediants_Quantite::class, 'ingrediants_ingrediants_quantite');
    }
}
