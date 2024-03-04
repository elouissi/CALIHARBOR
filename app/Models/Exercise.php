<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom',
        'image',
        'description'
    ];

    public function Seances(){

        return $this->belongsToMany(Seance::class, 'seance_exercise');
    }
    public function Skils(){

        return $this->belongsToMany(Skill::class, 'exercise_skills');
    }
    public function Exercises_Details(){

        return $this->belongsToMany(Exercises_Details::class, '_exercise__exercises__details');
    }
}
