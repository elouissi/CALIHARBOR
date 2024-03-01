<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    
    protected $fillable=[

    ];

    public function Enrolls()
    {
        return $this->belongsToMany(User::class, 'enrolls');
    }

    public function Seances(){

        return $this->belongsToMany(Seance::class, 'programme_seance');
    }
}
