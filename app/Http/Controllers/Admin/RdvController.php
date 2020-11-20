<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Rdv;
use App\Agence;
use App\Simulation;
use Illuminate\Http\Request;
use App\Http\Requests\RdvFormRequest;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titre = 'prise de rendez-vous';
        $rdvs = Rdv::all();

        return view('contact.rdv.index', compact('rdvs','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agence = Agence::all();
        $simulation = Simulation::all();

        return view('contact.rdv.create', compact('agence','simulation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RdvFormRequest $request)
    {
        Rdv::create($request->all());

        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function show(Rdv $rdv)
    {
        return view('contact.rdv.show',compact('rdv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdv $rdv)
    {
        return view('contact.rdv.edit',compact('rdv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function update(RdvFormRequest $request, Rdv $rdv)
    {
        Rdv::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdv $rdv)
    {
        $rdv->delete();

        return redirect()->route('');
    }
}
