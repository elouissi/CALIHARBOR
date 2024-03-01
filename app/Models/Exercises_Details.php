<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercises_Details extends Model
{
    use HasFactory;


    public function Exercises(){

        return $this->belongsToMany(Exercise::class, '_exercise__exercises__details');
    }
}
