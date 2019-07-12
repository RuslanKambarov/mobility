<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Config;
use Auth;

class EditController extends Controller
{
    public function index($table, Request $request){
        $html = "";

        switch($table){
            case 'users': {

                $this->validate($request, [
                    'Login' => 'required|string|max:255|min:4',
                    'firstname' => 'required|string|max:255|min:2',
                    'lastname' => 'required|string|max:255|min:2',
                    'patronymic' => 'max:255'
                ],[
                    'Login.required' => 'login.required',
                    'Password.required' => 'password.required',
                    'firstname.required' => 'firstname.required',
                    'lastname.required' => 'lastname.required'
                ]);

                $new_data = [];
                   
                foreach($request->all() as $key => $value)
                {
                    if($key != "_token" && $key != "id")
                    {
                        if($key == "Password")
                        {
                            if($request[$key] != null)
                            {
                                $this->validate($request, [
                                    'Password' => 'required|string|max:255|min:4'
                                ],[
                                    'Password.required' => 'password.required'
                                ]);
                                $new_data[$key] = md5($request[$key]);
                            }
                        }
                        else
                        {
                            if($key == "Login")
                            {
                                if( \App\User::loginUnique($request[$key]) )
                                {
                                    $new_data[$key] = $request[$key];
                                }
                            }
                            else
                            {
                                $new_data[$key] = $request[$key];
                            }
                        }
                        
                    } 
                }

                \App\User::where('id', '=', $request->id)->update($new_data);

                Log::info('edit_users', ['text' => $request->Login]);

                return response()->json(['text' => $request->Login, 'typeMsg' => 'success']);
            }
            case 'universities': {

                $this->validate($request, [
                    'name' => 'string|max:225|min:3',
                    'description' => 'string|max:500|min:3'
                ]);

                $university = \App\University::find($request->id);

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
