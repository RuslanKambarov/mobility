<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Auth;

class FetchController extends Controller
{
    public function index($table, Request $request){
        $html = "";

        switch($table){
            case 'users': {
                   
                $user = \App\User::find($request->id);

            }
        }

        return response()->json($user);
    }
}
