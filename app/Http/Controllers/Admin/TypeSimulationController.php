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
        $type = TypeSimulation::all();

        return view('contact.type.index',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.type.create');
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
        return redirect()->route('');
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
    public function edit(TypeSimulation $typeSimulation)
    {
        return view('contact.type.edit', compact('typeSimulation'));
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
        TypeSimulation::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeSimulation  $typeSimulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeSimulation $typeSimulation)
    {
        $typeSimulation->delete();

        return redirect()->route('');
    }
}
