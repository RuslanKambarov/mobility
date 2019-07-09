<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $table = 'roles';
    public $primaryKey = 'id';

    public function getName($id)
    {
        return $this->find($id)->name;
    }
}
