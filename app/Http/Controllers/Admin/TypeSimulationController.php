<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\TypeSimulation;
use Illuminate\Http\Request;
use App\Http\Requests\TypeSimulationFormRequest;

class TypeSimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titre = 'Type de simulateur';
        $typeSimulations = TypeSimulation::all();

        return view('contact.type.index',compact('typeSimulations', 'titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.type.create', compact());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeSimulationFormRequest $request)
    {
        TypeSimulation::create($request->all());
        return redirect()->route('admin.type-simulateur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function show(TypeSimulation $typeSimulation)
    {
        return view('contact.type.show', compact('typeSimulation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function edit($typeSimulation)
    {
        $titre = 'Editer: ';
        $typeSimulation = TypeSimulation::findOrFail($typeSimulation);
        return view('contact.type.edit', compact('typeSimulation','titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function update(TypeSimulationFormRequest $request, TypeSimulation $typeSimulation)
    {
        $typeSimulation->update($request->all());
        return redirect()->route('admin.type-simulateur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeSimulation)
    {
        $typeSimulation = TypeSimulation::find($typeSimulation);
        $typeSimulation->delete();
        return redirect()->route('admin.type-simulateur.index');
    }
}
