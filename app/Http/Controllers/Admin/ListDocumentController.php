<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListDocument;
use App\CategorieList;
use App\TypeSimulation;
use Illuminate\Http\Request;
use App\Http\Requests\ListDocumentFormRequest;

class ListDocumentController extends Controller
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
         *      path="/admin/list-document",
         *      operationId="getListDocuments",
         *      tags={"list-document"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get list of documents",
         *      description="La fonction index() permet d'afficher la liste des documents à fournir.",
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

        $titre = 'list des documents à fournir';
        $listDocuments = ListDocument::with(['type','categorie'])->get();
        $categories = CategorieList::all();
        $types = TypeSimulation::all();
        $listDocument = new ListDocument();
        return view('contact.list.index', compact('listDocuments', 'categories', 'types', 'titre', 'listDocument'));
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
    public function store(ListDocumentFormRequest $request)
    {
        /**
        * @OA\Post(
        ** path="/admin/list-document",
        *   tags={"list-document"},
        *   summary="Store list-document",
        *   operationId="postList-documentStore",
        *   description="La fonction store() permet d'enregistrer les informations d'un document à fournir. ",
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
        *      name="categorie_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="nomDoc",
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

        $list = ListDocument::create($request->all());
        if ($list) {
            emotify('success','La liste a été enregistrer avec succès');
            return redirect()->route('admin.list-document.index');
        } else {
            emotify('error','La permission n\'a pas pas été enregistrer. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function show(ListDocument $listDocument)
    {
        /**
     * @OA\Get(
     * path="/admin/list-document/{list-document}",
     *   tags={"list-document"},
     *   summary="show list-document",
     *   operationId="list-documentShow",
     *   description="La fonction show() permet d'afficher les détails d'un document à fournir.",
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


        return view('contact.list.index',compact('listDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(ListDocument $listDocument)
    {
        $titre = 'Editer: ';
        $categories = CategorieList::all();
        $types = TypeSimulation::all();
        return view('contact.list.edit',compact('listDocument','titre','types','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function update(ListDocumentFormRequest $request, ListDocument $listDocument)
    {
        /**
        * @OA\Put(
        ** path="/admin/list-document/{list-document}",
        *   tags={"list-document"},
        *   summary="Update list-document",
        *   operationId="PutList-document",
        *   description="La fonction update() permet de mettre à jour les informations d'un document à fournir.",
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
        *      name="categorie_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        * @OA\Parameter(
        *      name="nomDoc",
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

        $listDocument->update($request->all());
        if ($listDocument) {
            emotify('success','La liste a été modifier avec succès');
            return redirect()->route('admin.list-document.index');
        } else {
            emotify('error','La permission n\'a pas pas été modifier. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListDocument  $listDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    /**
     * @OA\Delete(
     * path="/admin/list-document/{list-document}",
     *   tags={"list-document"},
     *   summary="delete list-document",
     *   operationId="list-documentDelete",
     *   description="La fonction delete() permet de supprimer les informations d'un document à fournir.",
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


        $listDocument = ListDocument::find($id);
        $listDocument->delete();
        if ($listDocument) {
            emotify('success','La list a été supprimer avec succès');
            return redirect()->route('admin.list-document.index');
        } else {
            emotify('error','La list n\'a pas pas été supprimer. Veillez réessayer !');
            return back();
        }
        
    }
}
