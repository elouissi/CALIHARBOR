<?php

namespace App\Repositories;

use App\Models\Role;

class   RoleRepository implements RoleRepositoryInterface
{
    public function getById($id)
    {
        return Role::findOrFail($id);
    }

    public function create(array $data)
    {
        return Role::create($data);
    }
    public function getAll()
    {
        return Role::all();
    }

    public function update($id, array $data)
    {
        $Role = $this->getById($id);
        $Role->update($data);
        return $Role;
    }

    public function delete($id)
    {
        $Role = $this->getById($id);
        $Role->delete();
    }
}