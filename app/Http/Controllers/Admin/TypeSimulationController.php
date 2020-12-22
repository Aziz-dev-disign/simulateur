<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\TypeSimulation;
use Illuminate\Http\Request;
use App\Http\Requests\TypeSimulationFormRequest;

class TypeSimulationController extends Controller
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
         *      path="/admin/type-simulateur",
         *      operationId="getType-simulateurList",
         *      tags={"type-simulateur"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get list of simulateur-type",
         *      description="Return list of simulateur-type",
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

        $titre = 'Type de simulateur';
        $typeSimulations = TypeSimulation::all();

        return view('contact.type.index',compact('typeSimulations', 'titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.type.create', compact());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeSimulationFormRequest $request)
    {
        /**
        * @OA\Post(
        * path="/admin/type-simulateur",
        *   tags={"type-simulateur"},
        *   summary="Store simulateurs-type",
        *   operationId="postSimulateur-typeStore",
        *   description="La fonction store() permet d'enregistrer un type de simulateur donné.",
        *
        * @OA\Parameter(
        *      name="nom",
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


        $type = TypeSimulation::create($request->all());
        if ($type) {
            emotify('success','Le type a été enregistrer avec succès');
            return redirect()->route('admin.type-simulateur.index');
        } else {
            emotify('error','La type n\'a pas été enregistrer. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function show(TypeSimulation $typeSimulation)
    {
                /**
         * @OA\Get(
         * path="/admin/type-simulateur/{type-simulateur}",
         *   tags={"type-simulateur"},
         *   summary="type-simulateur show",
         *   operationId="type-simulateurShow",
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

        return view('contact.type.show', compact('typeSimulation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function edit($typeSimulation)
    {
        $titre = 'Editer: ';
        $typeSimulation = TypeSimulation::findOrFail($typeSimulation);
        return view('contact.type.edit', compact('typeSimulation','titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function update(TypeSimulationFormRequest $request, TypeSimulation $typeSimulation)
    {
        /**
        * @OA\Post(
        * path="/admin/type-simulateur/{type-simulateur}",
        *   tags={"type-simulateur"},
        *   summary="Update simulateurs-type",
        *   operationId="postSimulateur-typeUpdate",
        *   description="La fonction update() permet de mettre à jour les informations d'un type de simulateur.",
        *
        * @OA\Parameter(
        *      name="nom",
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

        $typeSimulation->update($request->all());
        if ($typeSimulation) {
            emotify('success','Le type a été modifier avec succès');
            return redirect()->route('admin.type-simulateur.index');
        } else {
            emotify('error','La type n\'a pas été modifier. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeSimulation)
    {
        /**
         * @OA\Delete(
         * path="/admin/type-simulateur/{type-simulateur}",
         *   tags={"type-simulateur"},
         *   summary="type-simulateur delete",
         *   operationId="type-simulateurDelete",
         *   description="La fonction delete() permet de supprimer les informations d'un type de simulateur donné.",
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


        $typeSimulation = TypeSimulation::find($typeSimulation);
        $typeSimulation->delete();
        if ($typeSimulation) {
            emotify('success','Le type a été enregistrer avec succès');
            return redirect()->route('admin.type-simulateur.index');
        } else {
            emotify('error','La type n\'a pas été supprimer. Veillez réessayer !');
            return back();
        }
        
    }
}
