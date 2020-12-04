<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agence;
use App\Http\Requests\AgenceFormRequest;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function update(AgenceFormRequest $request, Agence $agence)
    {
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
