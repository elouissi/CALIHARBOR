<?php

namespace App\Repositories;

use App\Models\Region;

class    RegionRepository implements RegionRepositoryInterface
{
    public function getById($id)
    {
        return Region::findOrFail($id);
    }

    public function create(array $data)
    {
        return Region::create($data);
    }
    public function getAll()
    {
        return Region::all();
    }

    public function update($id, array $data)
    {
        $Region = $this->getById($id);
        $Region->update($data);
        return $Region;
    }

    public function delete($id)
    {
        $Region = $this->getById($id);
        $Region->delete();
    }
}