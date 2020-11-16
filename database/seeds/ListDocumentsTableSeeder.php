<?php

use Illuminate\Database\Seeder;
use App\ListDocument;
class ListDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'id'                            =>'1',
                'type_id'                       =>'1',
                'categorie_id'                     =>'1',
                'nomDoc'                        =>'Dernier bulettin',
            ],
            [
                'id'                            =>'2',
                'type_id'                       =>'1',
                'categorie_id'                     =>'1',
                'nomDoc'                        =>'Carte d\'identité',
            ],
            [
                'id'                            =>'3',
                'type_id'                       =>'1',
                'categorie_id'                     =>'2',
                'nomDoc'                        =>'Trois dernier bulettins de salaire',
            ],
            [
                'id'                            =>'4',
                'type_id'                       =>'1',
                'categorie_id'                     =>'2',
                'nomDoc'                        =>'Le contrat de travail',
            ],            
            [
                'id'                            =>'5',
                'type_id'                       =>'2',
                'categorie_id'                     =>'1',
                'nomDoc'                        =>'Dernier bulettin',
            ],
            [
                'id'                            =>'6',
                'type_id'                       =>'2',
                'categorie_id'                     =>'1',
                'nomDoc'                        =>'Carte d\'identité',
            ],                        
            [
                'id'                            =>'7',
                'type_id'                       =>'2',
                'categorie_id'                     =>'2',
                'nomDoc'                        =>'Trois dernier bulettins de salaire',
            ],
            [
                'id'                            =>'8',
                'type_id'                       =>'2',
                'categorie_id'                     =>'2',
                'nomDoc'                        =>'Le contrat de travail',
            ],                        
            [
                'id'                            =>'9',
                'type_id'                       =>'3',
                'categorie_id'                     =>'1',
                'nomDoc'                        =>'Dernier bulettin',
            ],
            [
                'id'                            =>'10',
                'type_id'                       =>'3',
                'categorie_id'                     =>'1',
                'nomDoc'                        =>'Carte d\'identité',
            ],         
            [
                'id'                            =>'11',
                'type_id'                       =>'3',
                'categorie_id'                     =>'2',
                'nomDoc'                        =>'Trois dernier bulettins de salaire',
            ],
            [
                'id'                            =>'12',
                'type_id'                       =>'3',
                'categorie_id'                     =>'2',
                'nomDoc'                        =>'Le contrat de travail',
            ],
        ];

        ListDocument::insert($list);
    }
}
