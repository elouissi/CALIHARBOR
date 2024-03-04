<?php

namespace App\Repositories;

use App\Models\Ingrediants_Quantite;

class    Exercise_DetailsRepository implements Exercise_DetailsRepositoryInterface 
{
    public function getById($id)
    {
        return Ingrediants_Quantite::findOrFail($id);
    }

    public function create(array $data)
    {
        return Ingrediants_Quantite::create($data);
    }
    public function getAll()
    {
        return Ingrediants_Quantite::all();
    }

    public function update($id, array $data)
    {
        $Ingrediants_Quantite = $this->getById($id);
        $Ingrediants_Quantite->update($data);
        return $Ingrediants_Quantite;
    }

    public function delete($id)
    {
        $Ingrediants_Quantite = $this->getById($id);
        $Ingrediants_Quantite->delete();
    }
}