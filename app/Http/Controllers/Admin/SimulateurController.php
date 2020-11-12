<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Simulateur;
use App\TypeSimulation;
use Illuminate\Http\Request;

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
        Simulateur::create($request->all());
        return redirect()->route('');
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
        return view('contact.simulateur.edit',compact('simulateur'));
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
        Imulateur::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simulateur $simulateur)
    {
        $simulateur->delete();
        return redirect()->route('');
    }
}
