<?php

namespace App\Repositories;

use App\Models\Programme;

class     ProgrammeRepository implements ProgrammeRepositoryInterface
{
    public function getById($id)
    {
        return Programme::findOrFail($id);
    }

    public function create(array $data)
    {
        return Programme::create($data);
    }
    public function getAll()
    {
        return Programme::all();
    }

    public function update($id, array $data)
    {
        $Programme = $this->getById($id);
        $Programme->update($data);
        return $Programme;
    }

    public function delete($id)
    {
        $Programme = $this->getById($id);
        $Programme->delete();
    }
}