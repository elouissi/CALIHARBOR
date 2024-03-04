<?php

namespace App\Repositories;

use App\Models\Park;

class    ParkRepository implements ParkRepositoryInterface
{
    public function getById($id)
    {
        return Park::findOrFail($id);
    }

    public function create(array $data)
    {
        return Park::create($data);
    }
    public function getAll()
    {
        return Park::all();
    }

    public function update($id, array $data)
    {
        $Park = $this->getById($id);
        $Park->update($data);
        return $Park;
    }

    public function delete($id)
    {
        $Park = $this->getById($id);
        $Park->delete();
    }
}