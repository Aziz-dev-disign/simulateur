<?php

namespace App\Http\Controllers\VueClient;

use App\Http\Controllers\Controller;

use App\Agence;
use App\Simulateur;
use Illuminate\Http\Request;

class SimulateurCLientShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $agences = Agence::all();
        $simulateurs = Simulateur::all();
        return view('vueClient.simulateur.simulateur', compact('agences','simulateurs'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $simulateur = Simulateur::findOrFail($id);
        return view('vueClient.simulateur.show',compact('simulateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulateur $simulateur)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simulateur $simulateur)
    {
        //
    }
}
