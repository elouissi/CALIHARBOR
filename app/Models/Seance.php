<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'durée',
        'objectif',
        'description' 
    ];


    public function Programmes(){

        return $this->belongsToMany(Programme::class, 'programme_seance');
    }
    public function Exercises(){

        return $this->belongsToMany(Exercise::class, 'seance_exercise');
    }
    public function Repats(){

        return $this->belongsTo(Repat::class);
    }
}
