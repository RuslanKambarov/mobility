<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public $table = 'institution';
    public $primaryKey = 'id';

    static public function name()
    {
        return self::find(1)->name;
    }

    static public function logo()
    {
        return self::find(1)->logo;
    }
}
