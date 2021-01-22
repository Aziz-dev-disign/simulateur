<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Simulateur;
use App\Rdv;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','permission']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * @OA\Get(
         *      path="/admin/home",
         *      operationId="getStatistics",
         *      tags={"home"},
         *      security={
         *  {"passport": {}},
         *   },
         *      summary="Get elements",
         *      description="LA fonction index() permet d'afficher les statistiques",
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


        $users = User::all();
        $usersInactifs = User::statuInactif();
        $usersActifs = User::statuActif();
        $simulateurs = Simulateur::all();
        $simulateurActif = Simulateur::statuActif();
        $rdvs = Rdv::all();
        return view('contact.home', compact('users', 'usersActifs','usersInactifs','simulateurs','simulateurActif','rdvs'));
    }
}
