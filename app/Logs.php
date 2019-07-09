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
}
