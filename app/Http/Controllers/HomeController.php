<?php

namespace App\Http\Controllers;

use Auth;
use Str;
use Config;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locales = Config::get('app.locales');
        $active_module = 'home';
        $active_group = null;

        //$name_guard = $this->getNameGuard(Auth::guard()->getName());
        
        return view('home', compact('locales', 'active_module', 'active_group'));    
    }

    protected function getNameGuard($string)
    {
        $string = Str::after($string, '_');
        $string = Str::before($string, '_');

        return $string;
    }
}
