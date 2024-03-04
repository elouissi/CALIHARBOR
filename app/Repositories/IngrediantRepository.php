<?php

namespace App\Repositories;

use App\Models\Ingrediant;

class    IngrediantRepository implements IngrediantRepositoryInterface
{
    public function getById($id)
    {
        return Ingrediant::findOrFail($id);
    }

    public function create(array $data)
    {
        return Ingrediant::create($data);
    }
    public function getAll()
    {
        return Ingrediant::all();
    }

    public function update($id, array $data)
    {
        $Ingrediant = $this->getById($id);
        $Ingrediant->update($data);
        return $Ingrediant;
    }

    public function delete($id)
    {
        $Ingrediant = $this->getById($id);
        $Ingrediant->delete();
    }
}