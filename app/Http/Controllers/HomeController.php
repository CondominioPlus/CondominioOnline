<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.inicio');
    }

    public function registro(){
        return view('home.registro');
    }

    public function condominio(){
        return view('home.rcondominio');
    }
    public function unidades(){
        return view('home.runidades');
    }

    public function dashboard(){
        if(Auth::user()->isAdmin())
        return view('app.admin.dashboard');

        if(Auth::user()->isCondo())
        dd(Auth::user()->rol->nombre);

        
    }
}
