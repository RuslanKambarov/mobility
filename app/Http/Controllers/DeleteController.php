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
        }

    
    }
}
