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
        $simulateurs = Simulateur::all();

        return view('contact.simulateur.index',compact('simulateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeSimulation::all();
        return view('contact.simulateur.create',compact('types'));
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
        return view('contact.simulateur.show',compact('simulateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulateur $simulateur)
    {
        $types = TypeSimulation::all();
        return view('contact.simulateur.edit',compact('simulateur','types'));
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
