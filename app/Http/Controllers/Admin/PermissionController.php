<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Http\Requests\PermissionFormRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
