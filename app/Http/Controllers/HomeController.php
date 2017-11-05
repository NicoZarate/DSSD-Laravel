<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /* $conf=Configuration::find(1);
        if ($conf->enabled == 0 && Auth::user()->role_id == 3)  {
            Auth::logout();
            return redirect('/');
        }
        if (Auth::user()->role_id == 3 && Auth::user()->enabled == 0){
            Auth::logout();
            return view('pages.userDisabled');
        }elseif (Auth::user()->role_id == 3 && Auth::user()->up == 0) {
            Auth::logout();
            $msg="Lo sentimos, usted ha sido eliminado";
            return view('pages.login', compact('msg'));
        }*/
         return view('pages.dashboard');
    }
}
