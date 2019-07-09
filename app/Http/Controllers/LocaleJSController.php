<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;

class LocaleJSController extends Controller
{
    public function index(){
        return response()->json(Lang::get('frontend'));        
    }
}
