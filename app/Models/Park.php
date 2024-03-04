<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom',
        'adresse'

    ];


    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
