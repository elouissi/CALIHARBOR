<?php

namespace App\Repositories;

use App\Models\Seance;

class   SeanceRepository implements SeanceRepositoryInterface
{
    public function getById($id)
    {
        return Seance::findOrFail($id);
    }

    public function create(array $data)
    {
        return Seance::create($data);
    }
    public function getAll()
    {
        return Seance::all();
    }

    public function update($id, array $data)
    {
        $Seance = $this->getById($id);
        $Seance->update($data);
        return $Seance;
    }

    public function delete($id)
    {
        $Seance = $this->getById($id);
        $Seance->delete();
    }
}