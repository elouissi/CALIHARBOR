<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom'
    ];


    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function parks()
    {
        return $this->hasMany(Park::class);
    }
}
