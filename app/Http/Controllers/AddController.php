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

                Log::info('add_users', ['text' => $user->Login]);

                return response()->json(['text' => $user->Login , 'view' => $html, 'typeMsg' => 'success' ]);
            }//end user
            case 'universities': {

                $this->validate($request, [
                    'name' => 'string|max:225|min:3',
                    'description' => 'string|max:500|min:3'
                ]);

                $university = new \App\University;

                foreach($request->all() as $key => $value){

                    if($key != '_token'){

                        $university->$key = $value;

                    }

                }

                $university->save();

                $html = view("modules.{$table}.card" , compact('university') )->render();

                return response()->json(['text' => $university->name , 'view' => $html, 'typeMsg' => 'success' ]);


            }


        }


    }
}
