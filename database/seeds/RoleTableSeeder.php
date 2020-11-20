<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'        => 1,
                'nom'       =>'adminisitrateur'
            ],
            [
                'id'        => 2,
                'nom'       =>'agent'
            ],
        ];

        Role::insert($roles);
    }
}
