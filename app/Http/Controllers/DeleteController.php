<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Config;
use Auth;

class DeleteController extends Controller
{
    public function index($table, Request $request){
        $object = null;

        switch($table){
            case 'users': {

                $user = \App\User::find($request->id);

                $object = $user;

                $user->delete();

                Log::info('delete_users', ['text' => $user->Login]);

                return response()->json(['text' => $user->Login, 'typeMsg' => 'warning']);
            }

            case 'universities': {

                $university = \App\University::find($request->id);

                $object = $university;

                $university->delete();

                Log::info('delete_universities', ['text' => $university->name]);

                return response()->json(['text' => $university->name, 'typeMsg' => 'warning']);

            }
        }

    
    }
}
