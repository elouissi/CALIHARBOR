<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'titre',
        'duree',
        'prix',
        'description',
        'niveau' 
    ];

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function Seances(){

        return $this->belongsToMany(Seance::class, 'programme_seance');
    }
}
