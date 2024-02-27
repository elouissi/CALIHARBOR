<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
      
        $role = new Role();
        $role->name = 'admin';
        $role->save();
    
 

        $role = new Role();
        $role->name = 'user';
        $role->save();
   

        // Vérifier si l'utilisateur avec l'e-mail 'admin@gmail.com' existe déjà
        $adminUser = User::where('email', 'admin@gmail.com')->first();

        if (!$adminUser) {
            $adminUser = new User();
            $adminUser->name = 'Admin';
            $adminUser->email = 'admin@gmail.com';
            $adminUser->password = bcrypt('admin');
            $adminUser->age = 17;
            $adminUser->poids = 80;
            $adminUser->hauteur = 170;
            $adminUser->role_id= 1;
            $adminUser->save();
            $adminUser->roles()->attach($role);
         }
    }
}
