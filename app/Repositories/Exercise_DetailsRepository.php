<?php

namespace App\Repositories;

use App\Models\Exercises_Details;
use App\Models\Ingrediants_Quantite;

class    Exercise_DetailsRepository implements Exercise_DetailsRepositoryInterface 
{
    public function getById($id)
    {
        return Exercises_Details::findOrFail($id);
    }

    public function create(array $data)
    {
        return Exercises_Details::create($data);
    }
    public function getAll()
    {
        return Exercises_Details::all();
    }

    public function update($id, array $data)
    {
        $Exercises_Details = $this->getById($id);
        $Exercises_Details->update($data);
        return $Exercises_Details;
    }

    public function delete($id)
    {
        $Exercises_Details = $this->getById($id);
        $Exercises_Details->delete();
    }
}