<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom',
        'image',
        'durée',
        'description' 
    ];

    public function Exercises(){

        return $this->belongsToMany(Exercise::class, 'exercise_skills');
    }
}
