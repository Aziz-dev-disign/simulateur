<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\Http\Requests\RoleFormRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions',[]));
        if ($role) {
            emotify('success','Le catégorie a été enregistrer avec succès');
            return redirect()->route('admin.roles.index');
        } else {
            emotify('error','Le catégorie n\'a pas été enregistrer. Veillez réessayer !');
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
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions',[]));
        if ($role) {
            emotify('success','Le role a été modifier avec succès');
            return redirect()->route('admin.roles.index');
        } else {
            emotify('error','La role n\'a pas été modifier. Veillez réessayer !');
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
        $role->permissions()->detach();
        $role->delete();
        if ($role) {
            emotify('success','Le role a été enregistrer avec succès');
            return redirect()->route('admin.roles.index');
        } else {
            emotify('error','La role n\'a pas été supprimer. Veillez réessayer !');
            return back();
        }
        
    }
}
