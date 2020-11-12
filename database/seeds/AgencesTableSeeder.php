<?php

use Illuminate\Database\Seeder;
use App\Agence;
class AgencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agences = [
            [
                'id'        =>'1',
                'nom'       =>'1200 logements',
                'email'     =>'email1@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'2',
                'nom'       =>'Charles de Gaulle',
                'email'     =>'email2@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'3',
                'nom'       =>'Gounghin',
                'email'     =>'email3@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'4',
                'nom'       =>'Nations Unies',
                'email'     =>'email4@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'5',
                'nom'       =>'Patte d\'oie',
                'email'     =>'email5@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'6',
                'nom'       =>'Pissi',
                'email'     =>'email6@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'7',
                'nom'       =>'Premium',
                'email'     =>'email7@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'8',
                'nom'       =>'Somgandé',
                'email'     =>'email8@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'9',
                'nom'       =>'Tampoui',
                'email'     =>'email9@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'10',
                'nom'       =>'Zad',
                'email'     =>'email10@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
        ];

        Agence::insert($agences);
    }
}
