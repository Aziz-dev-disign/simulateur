<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\CategorieList;
use Illuminate\Http\Request;
use App\Http\Requests\categorieFormRequest;

class CategorieListController extends Controller
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
         *      path="/admin/categorie",
         *      operationId="getCategorieList",
         *      tags={"categorie"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get list of roles",
         *      description="la function index() permet d'afficher la liste des catégories des documents à fournir.",
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

        $titre = 'Catégorie de document';
        $categorieLists = CategorieList::all();
        return view('contact.categorie.index', compact('categorieLists','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return vies('contact.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categorieFormRequest $request)
    {

        /**
        * @OA\Post(
        ** path="/admin/categorie",
        *   tags={"categorie"},
        *   summary="Store categorie list",
        *   operationId="postCategorieStore",
        *   description="la fonction store() permet d'enregistrer la catégorie d'une liste de document à fournir pour une simulation.",
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

        $categorie = CategorieList::create($request->all());

        if ($categorie) {
            emotify('success','Les informations de la catégorie ont été enregistrer avec succès');
            return redirect()-route('admin.categorie.index');
        } else {
            emotify('error','Les informations de la catégorie n\'ont été enregistrer. Veillez réessayer !');
            return back();
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieList $categorieList)
    {
        /**
     * @OA\Get(
     * path="/admin/categorie/{categorie}",
     *   tags={"categorie"},
     *   summary="list categorie details",
     *   operationId="categorieDetails",
     *   description="la fonction show() permet d'afficher les détails d'une catégorie de document à fournir.",
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

        $titre = 'Détail de:';
        return view('contact.categorie.show', compact('categorieList','titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function edit($categorieList)
    {
        $titre = 'Editer: ';
        $categorieList = CategorieList::findOrFail($categorieList);
        return view('contact.categorie.edit',compact('categorieList', compact('titre')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function update(categorieFormRequest $request, CategorieList $categorieList)
    {

        /**
        * @OA\Put(
        ** path="/admin/categorie{categorie}",
        *   tags={"categorie"},
        *   summary="update categorie list",
        *   operationId="putCategorieUpdate",
        *   description="La founction update() permet de mettre à jour les informations d'une catégoerie.",
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

        $categorieList->update($request->all());
        return redirect()->route('admin.categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorieList  $categorieList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /**
     * @OA\Delete(
     * path="/admin/categorie/{categorie}",
     *   tags={"categorie"},
     *   summary="categorie delete",
     *   operationId="categorieDelete",
     *   description="La fonction delete() supprime les informations d'une catégorie en function de son id.",
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


        $categorieList = CategorieList::find($id);
        $categorieList->delete();
        return redirect()->route('admin.categorie.index');
    }
}
