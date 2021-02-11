<?php

namespace App\Http\Controllers\VueClient;

use App\Http\Controllers\Controller;

use App\Rdv;
use App\Agence;
use App\Simulateur;
use App\ListDocument;
use App\TDPCU;
use App\DCEPCU;
use Illuminate\Http\Request;
use App\Http\Requests\AccueilFormRequest;

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
    public function store(AccueilFormRequest $request)
    {
        Rdv::create($request->all());

        return redirect()->route('simulateur.credits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simulateur  $simulateur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tdpcus = TDPCU::select('age','duree','taux')->get();
        $dcepcus = DCEPCU::select('age','duree','taux')->get();
        // $tdpcus = response()->json($tdpcu);
        $simulateur = Simulateur::findOrFail($id);
        $docs = ListDocument::paginate(3);
        return view('vueClient.simulateur.show',compact('simulateur','docs','tdpcus','dcepcus'));
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
