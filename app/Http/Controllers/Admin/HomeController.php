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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $usersInactifs = User::statuInactif();
        $usersActifs = User::statuActif();
        $simulateurs = Simulateur::all();
        $simulateurActif = Simulateur::statuActif();
        $rdvs = Rdv::all();
        return view('contact.home', compact('users', 'usersActifs','usersInactifs','simulateurs','simulateurActif','rdvs'));
    }
}
