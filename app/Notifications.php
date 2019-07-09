<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public $table = 'notification';
    public $primaryKey = 'id';

    public function get($id)
    {
        return $this->find($id);
    }
}
