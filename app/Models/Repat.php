<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repat extends Model
{
    use HasFactory;

    public function Seances(){

        return $this->belongsToMany(Seance::class, 'seance_repat');
    }
}
