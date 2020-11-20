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
                'code'       =>'C1',             
                'nom'        =>'1200 logements',
                'email'     =>'email1@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'2',
                'code'      =>'C2',                
                'nom'       =>'Charles de Gaulle',
                'email'     =>'email2@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'3',
                'code'      =>'C3',       
                'nom'       =>'Gounghin',
                'email'     =>'email3@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'4',
                'code'      =>'C4',            
                'nom'       =>'Nations Unies',
                'email'     =>'email4@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'5',
                'code'      =>'C5',           
                'nom'       =>'Patte d\'oie',
                'email'     =>'email5@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'6',
                'code'      =>'C6',    
                'nom'       =>'Pissi',
                'email'     =>'email6@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'7',
                'code'      =>'C7',      
                'nom'       =>'Premium',
                'email'     =>'email7@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'8',
                'code'       =>'C8',       
                'nom'       =>'Somgandé',
                'email'     =>'email8@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'9',
                'code'      =>'C9',      
                'nom'       =>'Tampoui',
                'email'     =>'email9@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
            [
                'id'        =>'10',
                'code'      =>'C10',  
                'nom'       =>'Zad',
                'email'     =>'email10@email.com',
                'telephone' =>'00000001',
                'ville'     =>'Ouagadougou',
            ],
        ];

        Agence::insert($agences);
    }
}
