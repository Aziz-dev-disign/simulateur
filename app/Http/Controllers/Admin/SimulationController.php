<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Simulation;
use Illuminate\Http\Request;
use App\Http\Requests\SimulationFormRequest;

class SimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simulations = Simulation::all();

        return view('contact.simulation.index',compact('simulations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.simulation.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SimulationFormRequest $request)
    {
        Simulation::create($request->all());
        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simulation  $simulation
     * @return \Illuminate\Http\Response
     */
    public function show(Simulation $simulation)
    {
        return view('contact.simulation.show',compact('simulation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simulation  $simulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulation $simulation)
    {
        return view('contact.simulation.edit',compact('simulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Simulation  $simulation
     * @return \Illuminate\Http\Response
     */
    public function update(SimulationFormRequest $request, Simulation $simulation)
    {
        Simulation::update($request->all());
        return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simulation  $simulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simulation $simulation)
    {
        $simulation->delete();
        return redirect()->route('');
    }
}
