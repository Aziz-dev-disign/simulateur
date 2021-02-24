<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TDPCU;
use App\DCEPCU;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
class ImportFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.fichier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        $validation = $this->validate($request, [
            'fichierTD' => 'bail|required|file|mimes:xlsx'
        ]);

       if ($validation) 
       {
           $tdpcu = TDPCU::truncate();
           if ($tdpcu) 
           {
                // 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
                $fichier = $request->fichierTD->move(public_path(), $request->fichierTD->hashName());

                // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
                $reader = SimpleExcelReader::create($fichier);
        
                // On récupère le contenu (les lignes) du fichier
                $rows = $reader->getRows();

                // $rows est une Illuminate\Support\LazyCollection

                // 4. On insère toutes les lignes dans la base de données
                $status = TDPCU::insert($rows->toArray());

                // Si toutes les lignes sont insérées
                if ($status) {

                    // 5. On supprimer le fichier uploadé
                    $reader->close(); // On ferme le $reader
                    unlink($fichier);

                    // 6. Retour vers le formulaire avec un message $msg
                    return back()->withMsg("Importation réussie !");

                } else { abort(500); }
           }
           else {
               return back();
           }
       }
       else {
           return back();
       }
    
    }

    public function store_dce(Request $request)
    {

        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        $validationDCE =  $this->validate($request, [
            'fichierDCE' => 'bail|required|file|mimes:xlsx'
        ]);

        if ($validationDCE) {
            $dcepcu = DCEPCU::truncate();
            if ($dcepcu) {
                 // 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
                $fichier = $request->fichierDCE->move(public_path(), $request->fichierDCE->hashName());

                // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
                $reader = SimpleExcelReader::create($fichier);
        
                // On récupère le contenu (les lignes) du fichier
                $rows = $reader->getRows();

                // $rows est une Illuminate\Support\LazyCollection

                // 4. On insère toutes les lignes dans la base de données
                $status = DCEPCU::insert($rows->toArray());

                // Si toutes les lignes sont insérées
                if ($status) {

                    // 5. On supprimer le fichier uploadé
                    $reader->close(); // On ferme le $reader
                    unlink($fichier);

                    // 6. Retour vers le formulaire avec un message $msg
                    return back()->withMsg("Importation réussie !");

                } else { abort(500); }
            }
            else {
                return back();
            }
        }    
        else {
            return back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
