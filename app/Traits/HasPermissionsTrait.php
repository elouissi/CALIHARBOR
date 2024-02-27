<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasPermissionsTrait
{
    

   
 
 

    public function hasRole(...$roles)
    {
        foreach($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

 
}
