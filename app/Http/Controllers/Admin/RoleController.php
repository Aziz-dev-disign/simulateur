<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\Http\Requests\RoleFormRequest;
use App\Http\Requests\MassDestroye\RoleMassDestroye;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        /**
         * @OA\Get(
         *      path="/admin/role",
         *      operationId="getRoleList",
         *      tags={"rôle"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get list of roles",
         *      description="La fonction index() renvoie une liste des rôles.",
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

        $titre = 'Rôles';
        $roles = Role::all();
        $permissions = Permission::all()->pluck('nom','id');

        return view('contact.role.index', compact('roles','permissions', 'titre'));
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
    public function store(RoleFormRequest $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        /**
        * @OA\Post(
        * path="/admin/role/{role}",
        *   tags={"rôle"},
        *   summary="roles store",
        *   operationId="putRoleStore",
        *   description="La fonction store() permet d'enregistrer un rôle.",
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

        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions',[]));
        if ($role) {
            emotify('success','Le rôle a été enregistrer avec succès');
            return redirect()->route('admin.roles.index');
        } else {
            emotify('error','Le rôle n\'a pas été enregistrer. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        /**
     * @OA\Get(
     ** path="/admin/role/{role}",
     *   tags={"rôle"},
     *   summary="role détail",
     *   operationId="roleDetails",
     *   description="La fonction show() permet d'afficher les informations d'un rôle.",
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

        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $titre = 'détails de';
        $role->load('permissions');
        return rview('contact.role.show', compact('role', 'titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $titre = 'éditer: ';
        $permissions = Permission::all()->pluck('nom', 'id');
        $role->load('permissions');
        return view('contact.role.edit', compact('role','permissions','titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleFormRequest $request, Role $role)
    {

        /**
        * @OA\Put(
        * path="/admin/role/{role}",
        *   tags={"rôle"},
        *   summary="Update roles",
        *   operationId="putRoleUpdate",
        *   description="La fonction update() renvoie une mis à jour des informations d'un rôle.",
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


        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions',[]));
        if ($role) {
            emotify('success','Le rôle a été modifier avec succès');
            return redirect()->route('admin.roles.index');
        } else {
            emotify('error','La rôle n\'a pas été modifier. Veillez réessayer !');
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        /**
     * @OA\Delete(
     * path="/admin/role/{role}",
     *   tags={"rôle"},
     *   summary="role delete",
     *   operationId="roleDelete",
     *   description="La fonction delete() permet de supprimer les informations d'un rôle.",
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


        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->permissions()->detach();
        $role->delete();
        if ($role) {
            emotify('success','Le rôle a été enregistrer avec succès');
            return redirect()->route('admin.roles.index');
        } else {
            emotify('error','La rôle n\'a pas été supprimer. Veillez réessayer !');
            return back();
        }
        
    }


}
