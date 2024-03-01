<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    public function Users()
    {
        return $this->belongsToMany(User::class, 'users');
    }
    public function Programmes()
    {
        return $this->belongsToMany(Programme::class, 'programmes');
    }
}
