<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Http\Requests\PermissionFormRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;


class PermissionController extends Controller
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
         *      path="/admin/permission",
         *      operationId="getPermissionList",
         *      tags={"permission"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get list of permissions",
         *      description="La fonction index() permet d'afficher une liste des permissions.",
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

        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $titre = 'List des permissions';
        $permissions = Permission::all();

        return view('contact.permission.index', compact('permissions', 'titre'));
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
    public function store(PermissionFormRequest $request)
    {

        /**
        * @OA\Post(
        * path="/admin/permission",
        *   tags={"permission"},
        *   summary="Store permissions",
        *   operationId="postPermissionStore",
        *   description="La fonction store() permet d'enregistrer une permission.",
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
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission = Permission::create($request->all());

        if ($permission) {
            emotify('success','La permission a été enregistrer avec succès');
            return redirect()->route('admin.permissions.index');
        } else {
            emotify('error','La permission n\'a pas pas été enregistrer. Veillez réessayer !');
            return back();
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
    /**
     * @OA\Get(
     * path="/admin/permission/{permission}",
     *   tags={"permission"},
     *   summary="permission details",
     *   operationId="permissionDetails",
     *   description="La fonction show() permet d'afficher les informations d'une permission.",
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

        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $titre = 'Détails de ';
        $permission->load('permissionsRole');
        return view('contact.permission.show', compact('permission', 'titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $titre = 'Editer: ';
        return view('contact.permission.edit', compact('permission', 'titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionFormRequest $request, Permission $permission)
    {

        /**
        * @OA\Put(
        * path="/admin/permission/{permission}",
        *   tags={"permission"},
        *   summary="Update permissions",
        *   operationId="putPermissionUpdate",
        *   description="La fonction update() permet de mettre à jour les informations d'une permission.",
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

        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission->update($request->all());
        if ($permission) {
            emotify('success','La permission a été modifier avec succès');
            return redirect()->route('admin.permissions.index');
        } else {
            emotify('error','La permission n\'a pas été modifier. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        /**
         * @OA\Delete(
         * path="/admin/permission/{permission}",
         *   tags={"permission"},
         *   summary="permission delete",
         *   operationId="La fonction delete() supprime les informations d'une permission",
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


        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission->delete();
        if ($permission) {
            emotify('success','La permission a été supprimer avec succès');
            return redirect()->route('admin.permissions.index');
        } else {
            emotify('error','La permission n\'a pas été supprimer. Veillez réessayer !');
            return back();
        }
        
    }
}
