<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Session;
use App;

class LocaleController extends Controller
{
    public function index($locale){
	    	if (in_array($locale, Config::get('app.locales'))) {    
                Session::put('locale', $locale); 
               }

	    	return redirect()->back();       
    }
}
