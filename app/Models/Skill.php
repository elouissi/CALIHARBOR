<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function Exercises(){

        return $this->belongsToMany(Exercise::class, 'exercise_skills');
    }
}
