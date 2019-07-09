<?php

namespace App;

use Str;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    public $table = 'modules';
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
        return $this->find($id)->font_icon;
    }

    public function getGroupId($id)
    {
        return $this->find($id)->group_id;
    }
}
