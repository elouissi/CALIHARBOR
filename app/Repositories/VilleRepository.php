<?php

namespace App\Repositories;

 use App\Models\Ville;

class  VilleRepository implements VilleRepositoryInterface 
{
    public function getById($id)
    {
        return Ville::findOrFail($id);
    }

    public function create(array $data)
    {
        return Ville::create($data);
    }
    public function getAll()
    {
        return Ville::all();
    }

    public function update($id, array $data)
    {
        $Ville = $this->getById($id);
        $Ville->update($data);
        return $Ville;
    }

    public function delete($id)
    {
        $Ville = $this->getById($id);
        $Ville->delete();
    }
}