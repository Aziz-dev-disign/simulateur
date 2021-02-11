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
                'nomDoc'                        =>['Dernier bulettin','Trois dernier bulettins de salaire','Le contrat de travail','Carte d\'identité'],
            ],           
            [
                'id'                            =>'5',
                'type_id'                       =>'2',
                'categorie_id'                  =>'1',
                'nomDoc'                        =>['Dernier bulettin','Trois dernier bulettins de salaire','Le contrat de travail','Carte d\'identité'],
            ],                      
            [
                'id'                            =>'9',
                'type_id'                       =>'3',
                'categorie_id'                  =>'1',
                'nomDoc'                        =>['Dernier bulettin','Trois dernier bulettins de salaire','Le contrat de travail','Carte d\'identité'],
            ],
        ];

        ListDocument::insert($list);
    }
}
