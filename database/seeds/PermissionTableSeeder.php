<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisiions =[
            [
                'id'    => '1',
                'nom' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'nom' => 'permission_create',
            ],
            [
                'id'    => '3',
                'nom' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'nom' => 'permission_show',
            ],
            [
                'id'    => '5',
                'nom' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'nom' => 'permission_access',
            ],
            [
                'id'    => '7',
                'nom' => 'role_create',
            ],
            [
                'id'    => '8',
                'nom' => 'role_edit',
            ],
            [
                'id'    => '9',
                'nom' => 'role_show',
            ],
            [
                'id'    => '10',
                'nom' => 'role_delete',
            ],
            [
                'id'    => '11',
                'nom' => 'role_access',
            ],
            [
                'id'    => '12',
                'nom' => 'user_create',
            ],
            [
                'id'    => '13',
                'nom' => 'user_edit',
            ],
            [
                'id'    => '14',
                'nom' => 'user_show',
            ],
            [
                'id'    => '15',
                'nom' => 'user_delete',
            ],
            [
                'id'    => '16',
                'nom' => 'user_access',
            ]
        ];

        Permission::insert($permisiions);
    }
}
