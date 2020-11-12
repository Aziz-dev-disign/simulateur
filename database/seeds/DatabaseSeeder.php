<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgencesTableSeeder::class);
        $this->call(TypeSimulationTableSeeder::class);
        $this->call(CategorieListTableSeeder::class);
        $this->call(ListDocumentsTableSeeder::class);
    }
}
