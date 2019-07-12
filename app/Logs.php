<?php

namespace App;

use Str;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    public $table = 'logs';
    public $primaryKey = 'id';

    public function get($id)
    {
        return $this->find($id);
    }

    static public function getContext($id)
    {
        
        $str = str_replace('{', '', str_replace('}', '', self::find($id)['context'] ?? '') );

        $array = explode(',', $str);
        
        $data = [];
        foreach($array as $element)
        {
            $key = Str::before($element, ':');
            $key = str_replace('"', '', $key);

            $value = Str::after($element, ':');

            $data[$key] = $value;
        }

        return $data;
    }
}
