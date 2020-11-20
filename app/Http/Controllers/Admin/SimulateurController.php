<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Simulateur;
use App\TypeSimulation;
use Illuminate\Http\Request;
use App\Http\Requests\SimulateurFormRequest;

class SimulateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titre = 'Simulateur';
        $simulateurs = Simulateur::all();

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
    public function store(Request $request)
    {
        $imagePath = request('image')->store('simulateur','public');

        Simulateur::create([
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
         
        return redirect()->route('admin.simulateur.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function show(Simulateur $simulateur)
    {
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
    public function update(Request $request, Simulateur $simulateur)
    {
        if (request('image')) {
            
            $imagePath = request('image')->store('simulateur','public');
            $simulateur->update(array_merge($request->all(),['image'=>$imagePath]));
            return redirect()->route('admin.simulateur.index');
        }
        else {
            $simulateur->update($request->all());
            return redirect()->route('admin.simulateur.index');
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
        $simulateur = Simulateur::find($id);
        $simulateur->delete();
        return redirect()->route('admin.simulateur.index');
    }
}
