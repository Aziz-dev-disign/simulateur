<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class Role_permission_foreign_keyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission){
            return substr($permission->nom, 0, 2) != 'user_' && substr($permission->nom, 0, 2) != 'role_' && substr($permission->nom, 0, 16) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
