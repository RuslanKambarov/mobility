<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Auth;
use Institution;

class ModulesController extends Controller
{
    public function index($module, $part = null){
        $view = 'modules.'.$module.'.'.$module;
        $locales = Config::get('app.locales');
        $active_module = null;
        $active_group = null;

        foreach(Auth::user()->modules() as $mod)
        {
            if($mod->name == $module)//если модуль есть в списке доступных
            {
                $active_module = $module;//сохраняем имя активного модуля
                if($mod->group_id != null)//если модуль принадлежит группе
                {
                    $active_group = (new \App\GroupModules)->getName($mod->group_id);//сохраняем имя активной группы
                }

                if(isset($part))//усли третья секция url существует 
                {
                    if( view()->exists($view.'.'.$part) )//если существует view
                    {
                        return view($view.'.'.$part, compact('locales', 'active_module', 'active_group')); 
                    }
                    else//если не существует view
                    {
                        //при переходе на другой модуль он записывается в секцию part
                        foreach(Auth::user()->modules() as $mod2)//проверяем доступен ли модуль, или существует ли он вообще
                        {
                            if($mod2->name == $part)//если да
                            {
                                return redirect('/'.$part);//переходим на модуль который записан в секции part
                            }
                        }
                        return redirect('/404');//если модуль не доступен или не существует
                    }
                }
                return view($view, compact('locales', 'active_module', 'active_group'));      
            }
        }

        $active_module = 'home';
        return view('errors.404', compact('locales', 'active_module', 'active_group')); 
    }
}
