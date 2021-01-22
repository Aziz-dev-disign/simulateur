<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Simulateur;
use App\TypeSimulation;
use Illuminate\Http\Request;
use App\Http\Requests\SimulateurFormRequest;
use App\Http\Requests\SimulateurUpdateFormRequest;
use Intervention\Image\Facades\Image;

class SimulateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * @OA\Get(
         *      path="/admin/simulateur",
         *      operationId="getSimulateurListe",
         *      tags={"simulateur"},
         *      security={
         *  {"passport": {}},
         *   },
         *      summary="Get simulateur elements list",
         *      description="La fonction index() renvoie une liste des simulateurs.",
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *          @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *      ),
         *      @OA\Response(
         *          response=401,
         *          description="Unauthenticated",
         *      ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      ),
         * @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         * @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *  )
         */

        $titre = 'Simulateur';
        $simulateurs = Simulateur::select('*')->orderBy('id','desc')->get();

        return view('contact.simulateur.index',compact('simulateurs','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titre = 'Ajouter un simulateur';
        $types = TypeSimulation::all();
        return view('contact.simulateur.create',compact('types','titre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SimulateurFormRequest $request)
    {

        /**
        * @OA\Post(
        * path="/admin/simulateur",
        *   tags={"simulateur"},
        *   summary="Store simulateurs",
        *   operationId="postSimulateur",
        *   description="La fonction store() permet d'enregistere les informations d'un simulateur.",
        *
        * @OA\Parameter(
        *      name="type_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="nom",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="slug",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="statut",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="montantMin",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="montantMax",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="taux",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="dureeMin",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="dureeMax",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="image",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="file"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="description",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * 
        *   @OA\Response(
        *      response=201,
        *       description="Success",
        *      @OA\MediaType(
        *           mediaType="application/json",
        *      )
        *   ),
        *   @OA\Response(
        *      response=401,
        *       description="Unauthenticated"
        *   ),
        *   @OA\Response(
        *      response=400,
        *      description="Bad Request"
        *   ),
        *   @OA\Response(
        *      response=404,
        *      description="not found"
        *   ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
        *)
        **/
        
        $imagePath = request('image')->store('simulateur','public');
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(348, 197);
        $image->save();

        $simulateur = Simulateur::create([
            'type_id'=>$request->type_id,
            'nom'=>$request->nom,
            'slug'=>$request->slug,
            'statut'=>$request->statut,
            'montantMin'=>$request->montantMin,
            'montantMax'=>$request->montantMax,
            'taux'=>$request->taux,
            'dureeMin'=>$request->dureeMin,
            'dureeMax'=>$request->dureeMax,
            'image'=>$imagePath,
            'description'=>$request->description,
        ]);

        if ($simulateur) {
            emotify('success','Les informations du simulateur ont été enregistrer avec succès');
            return redirect()->route('admin.simulateur.create');
        } else {
            emotify('success','Les informations du simulateur n\'ont pas été enregistrer avec succès');
            return back();
        }
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function show(Simulateur $simulateur)
    {
        /**
     * @OA\Get(
     * path="/admin/simulateur/{simulateur}",
     *   tags={"simulateur"},
     *   summary="simulateur show",
     *   operationId="LA fonction show() permet d'afficher les informations d'un simulateur.",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/


        $titre = 'Détail de ';
        return view('contact.simulateur.show',compact('simulateur','titre'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulateur $simulateur)
    {
        $titre = 'Editer ';
        $types = TypeSimulation::all();
        return view('contact.simulateur.edit',compact('simulateur','types','titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function update(SimulateurUpdateFormRequest $request, Simulateur $simulateur)
    {


        /**
        * @OA\Put(
        * path="/admin/simulateur/{simulateur}",
        *   tags={"simulateur"},
        *   summary="Update simulateur",
        *   operationId="postSimulateur",
        *   description="La fonction update() permet de mettre à jour les informations d'un simulateur.",
        *
        * @OA\Parameter(
        *      name="type_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="nom",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="slug",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="statut",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="montantMin",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="montantMax",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="taux",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="dureeMin",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="dureeMax",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="image",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="file"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="description",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * 
        *   @OA\Response(
        *      response=201,
        *       description="Success",
        *      @OA\MediaType(
        *           mediaType="application/json",
        *      )
        *   ),
        *   @OA\Response(
        *      response=401,
        *       description="Unauthenticated"
        *   ),
        *   @OA\Response(
        *      response=400,
        *      description="Bad Request"
        *   ),
        *   @OA\Response(
        *      response=404,
        *      description="not found"
        *   ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
        *)
        **/

        if (request('image')) {
            
            $imagePath = request('image')->store('simulateur','public');
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(348, 197);
             $image->save();
            $simulateur->update(array_merge($request->all(),['image'=>$imagePath]));
            if ($simulateur) {
                emotify('success','Les informations du simulateur ont été modifier avec succès');
                return redirect()->route('admin.simulateur.index');
            } else {
                emotify('success','Les informations du simulateur n\'ont pas été modifier avec succès');
                return back();
            }
            
        }
        else {
            $simulateur->update($request->all());
            if ($simulateur) {
                emotify('success','Les informations du simulateur ont été modifier avec succès');
                return redirect()->route('admin.simulateur.index');
            } else {
                emotify('success','Les informations du simulateur n\'ont pas été modifier avec succès');
                return back();
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    /**
     * @OA\Delete(
     * path="/admin/simulateur/{simulateur}",
     *   tags={"simulateur"},
     *   summary="simulateur delete",
     *   operationId="simulateurDelete",
     *   description="La fonction delete() permet de supprimer les informations d'un simulateur.",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/

        $simulateur = Simulateur::find($id);
        $simulateur->delete();
        if ($simulateur) {
            emotify('success','Les informations du simulateur ont été supprimer avec succès');
            return redirect()->route('admin.simulateur.index');
        } else {
            emotify('error','Le simulateur n\'a pas été supprimer. Veillez réessayer !');
            return back();
        }
        
    }
}
