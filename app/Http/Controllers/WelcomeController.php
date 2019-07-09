<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Auth;

class WelcomeController extends Controller
{
    public function index(){
        $locales = Config::get('app.locales');

        if( Auth::user() )
        {
            return redirect('/home');
        }
        
        return view('auth.login', compact('locales'));      
    }
}
