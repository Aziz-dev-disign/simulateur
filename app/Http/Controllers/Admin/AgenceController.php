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
        $agences = Agence::all();
        return view('contact.agence.index');
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
        Agence::create($request->all());
        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
        return view('contact.agence.show', compact('agence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
        return view('contact.agence.edit', compact('agence'));
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
        Agence::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        $agence->delete();
        return redirect()-route('');
    }
}
