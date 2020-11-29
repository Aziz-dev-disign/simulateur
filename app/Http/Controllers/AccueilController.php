<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Simulateur;
class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simulateurs = Simulateur::statuActif();
        return view('welcome',compact('simulateurs'));
    }
}