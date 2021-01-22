<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rdv;
use Illuminate\Http\Request;
use App\Http\Requests\AccueilFormRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * @OA\Get(
         *      path="/admin/contact",
         *      operationId="getRendezList",
         *      tags={"rendez-vous"},
         * security={
         *  {"passport": {}},
         *   },
         *      summary="Get rendez-vous list",
         *      description="la fonction index() affiche les rendez-vous faites par les clients.",
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *          @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *      ),
         *      @OA\Response(
         *          response=401,
         *          description="Unauthenticated",
         *      ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      ),
         * @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         * @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *  )
         */


        $titre = 'Inbox';
        $rdvs = Rdv::all();

        return view('contact.contact.index',compact('rdvs','titre'));
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
        Rdv::insert($request->all());
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function show($rdv)
    {
        $rdv = Rdv::findOrFail($rdv);
        return view('contact.contact.show',compact('rdv'));
    }

        
    public function print($rdv)
    {
        $rdv = Rdv::findOrFail($rdv);
        return view('contact.contact.show',compact('rdv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdv $rdv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdv $rdv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rdv  $rdv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rdv = Rdv::findOrFail($id);
        $rdv->delete();
        if ($user) {
            emotify('success','Les informations de l\'utilisateur ont été supprimer avec succès');
            return redirect()->route('admin.contact.index');
        } else {
            emotify('error','Les informations de l\'utilisateur n\'ont pas été supprimer. Veillez réessayer!');
            return redirect()->route('admin.contact.index');
        }
    }
}
