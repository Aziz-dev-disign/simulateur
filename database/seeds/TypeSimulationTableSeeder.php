<?php

use Illuminate\Database\Seeder;
use App\TypeSimulation;
class TypeSimulationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =[
            [
                'id'                =>'1',
                'nom'               =>'Simulateur de prêt scolaire',
            ],
            [
                'id'                =>'2',
                'nom'               =>'Simulateur de prêt personnel ordinaire',
            ],
            [
                'id'                =>'3',
                'nom'               =>'Simulateur de prêt personnel immobilier',
            ],
        ];

        TypeSimulation::insert($types);
    }
}
