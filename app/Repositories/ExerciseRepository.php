<?php

namespace App\Repositories;

use App\Models\Exercise;
 
class    ExerciseRepository implements ExerciseRepositoryInterface 
{
    public function getById($id)
    {
        return Exercise::findOrFail($id);
    }

    public function create(array $data)
    {
        return Exercise::create($data);
    }
    public function getAll()
    {
        return Exercise::all();
    }

    public function update($id, array $data)
    {
        $Exercise = $this->getById($id);
        $Exercise->update($data);
        return $Exercise;
    }

    public function delete($id)
    {
        $Exercise = $this->getById($id);
        $Exercise->delete();
    }
}