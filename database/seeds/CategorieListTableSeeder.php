<?php

use Illuminate\Database\Seeder;
use App\CategorieList;
class CategorieListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie = [
            [
                'id'            =>'1',
                'nom'           =>'Fonction public',  
            ],
            [
                'id'            =>'2',
                'nom'           =>'Fonction privée',  
            ],
        ];

        CategorieList::insert($categorie);
    }
}
