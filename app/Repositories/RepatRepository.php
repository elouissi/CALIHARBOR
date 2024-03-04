<?php

namespace App\Repositories;

use App\Models\Repat;

class   RepatRepository implements RepatRepositoryInterface
{
    public function getById($id)
    {
        return Repat::findOrFail($id);
    }

    public function create(array $data)
    {
        return Repat::create($data);
    }
    public function getAll()
    {
        return Repat::all();
    }

    public function update($id, array $data)
    {
        $Repat = $this->getById($id);
        $Repat->update($data);
        return $Repat;
    }

    public function delete($id)
    {
        $Repat = $this->getById($id);
        $Repat->delete();
    }
}