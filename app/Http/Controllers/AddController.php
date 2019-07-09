<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Config;
use Auth;

class AddController extends Controller
{
    public function index($table, Request $request){
        $html = "";

        switch($table){
            case 'users': {

                $this->validate($request, [
                    'Login' => 'required|string|max:255|min:4|unique:mysql.users',
                    'Password' => 'required|string|max:255|min:8',
                    'firstname' => 'required|string|max:255|min:2',
                    'lastname' => 'required|string|max:255|min:2',
                    'patronymic' => 'max:255'
                ],[
                    'Login.required' => 'login.required',
                    'Password.required' => 'password.required',
                    'firstname.required' => 'firstname.required',
                    'lastname.required' => 'lastname.required'
                ]);

                $user = new \App\User;
                   
                foreach($request->all() as $key => $value)
                {
                    if($key != "_token")
                    {
                        if($key == "Password")
                        {
                            $user[$key] = md5($request[$key]);
                        }
                        else
                        {
                            $user[$key] = $request[$key];
                        }
                        
                    } 
                }

                $user->save();

                $html = view("modules.{$table}.card" , compact('user') )->render();

                //Log::info('add_users', ['id' => $user->id]);
            }
        }

        return response()->json(['view' => $html ]);
    }
}
