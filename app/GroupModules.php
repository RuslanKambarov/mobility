<?php

namespace App;

use Str;

use Illuminate\Database\Eloquent\Model;

class GroupModules extends Model
{
    public $table = 'group_modules';
    public $primaryKey = 'id';

    public function get($id)
    {
        return $this->find($id);
    }

    public function getName($id)
    {
        return $this->find($id)->name;
    }

    public function getFontIcon($id)
    {
        return $this->find($id)->icon;
    }
}
