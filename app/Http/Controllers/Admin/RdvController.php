<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Rdv;
use App\Agence;
use App\Simulation;
use Illuminate\Http\Request;
use App\Http\Requests\AccueilFormRequest;

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

        return view('welcome', compact('agence'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilFormRequest $request)
    {
        Rdv::create($request->all());

        return redirect()->route('admin.rendez-vous.create');
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
        $rdv->update($request->all());

        return redirect()->route('admin.rendez-vous.create');
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

        return redirect()->route('admin.rendez-vous.create');
    }
}
