<?php

namespace App\Repositories;

use App\Models\Skill;

class  SkillRepository implements SkillRepositoryInterface
{
    public function getById($id)
    {
        return Skill::findOrFail($id);
    }

    public function create(array $data)
    {
        return Skill::create($data);
    }
    public function getAll()
    {
        return Skill::all();
    }

    public function update($id, array $data)
    {
        $Skill = $this->getById($id);
        $Skill->update($data);
        return $Skill;
    }

    public function delete($id)
    {
        $Skill = $this->getById($id);
        $Skill->delete();
    }
}