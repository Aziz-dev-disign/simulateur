<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agence;
use App\Http\Requests\AgenceFormRequest;
use App\Http\Requests\AgenceUpdateFormRequest;
class AgenceController extends Controller
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
         *      path="/admin/agence",
         *      operationId="getAgenceList",
         *      tags={"agence"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get agences list",
         *      description="la fonction index() affiche la liste des agences",
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

        $titre = 'Agence';
        $agences = Agence::all();
        return view('contact.agence.index', compact('agences','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.agence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgenceFormRequest $request)
    {

        /**
        * @OA\Post(
        ** path="/admin/agence",
        *   tags={"agence"},
        *   summary="Store agence",
        *   operationId="postAgenceStore",
        *   description="la fonction store() permet d'enregisterer une agence",
        *
        * @OA\Parameter(
        *      name="nom",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="code",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="email",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="telephone",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="ville",
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

         $agence = Agence::create($request->all());
         if ($agence) {
            emotify('success','Les informations de l\'agence ont été enregistrer avec succès');
            return redirect()->route('admin.agence.index');             
         } else {
            emotify('error','Les informations de l\'article n\'ont été enregistrer. Veillez réessayer!');
            return redirect()->back();
         }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
    /**
     * @OA\Get(
     * path="/admin/agence/{agence}",
     *   tags={"agence"},
     *   summary="Agence details",
     *   operationId="agenceDetails",
     *   description="la fonction show() permet d'afficher les details d'une agence",
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
        return view('contact.agence.show', compact('agence','titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
        $titre = 'Editer: ';
        return view('contact.agence.edit', compact('agence','titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(AgenceUpdateFormRequest $request, Agence $agence)
    {
        /**
        * @OA\Put(
        ** path="/admin/agence/{agence}",
        *   tags={"agence"},
        *   summary="Update agence",
        *   operationId="postAgenceUpdate",
        *   description="la fonction update() permet de mettre à jour les informations d'une agence.",
        *
        * @OA\Parameter(
        *      name="nom",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="code",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="email",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="telephone",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="ville",
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

        $agence->update($request->all());

        if ($agence) {
            emotify('success','Les informations de l\'article ont été modifier avec succès');
            return redirect()->route('admin.agence.index');
        } else {
            emotify('error','Les informations de l\'article n\'ont été modifier. Veillez réessayer!');
            return back();
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * @OA\Delete(
         * path="/admin/agence/{agence}",
         *   tags={"agence"},
         *   summary="Agence delete",
         *   operationId="agenceDelete",
         *   description="la fonction show() permet de supprimer les informations d'une agence",
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

        $agence = Agence::find($id);
        $agence->delete();
        if ($agence) {
            emotify('success','Les informations de l\'article ont été supprimer avec succès');
            return redirect()->route('admin.agence.index');
        } else {
            emotify('error','Les informations de l\'article n\'ont été supprimer. Veillez réessayer!');
            return back();
        }
        
    }
}
