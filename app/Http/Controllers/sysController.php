<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;

class sysController extends Controller
{
    public function localeJS(){
        return response()->json(Lang::get('frontend'));        
    }

    public function notifChange(Request $request){

        if($request->id)
        {
            $new_data = ['state' => 1];
        
            \App\Notifications::where('id', '=', $request->id)->update($new_data);
        }

        $html = view("modules.notifications.dropdownlist" )->render();
        return response()->json(['view' => $html]);        
    }
}
