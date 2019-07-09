<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abilities extends Model
{
    public $table = 'abilities';
    public $primaryKey = 'id';

    public function getAbilities($role_id, $module_id)
    {
        return $this->where('role_id', '=', $role_id)->where($this->$modul_id, '=', $module_id)->first();
    }

    public function getModules($role_id)
    {
        return $this->leftJoin('modules', 'abilities.modul_id', '=', 'modules.id')
                    ->where('abilities.role_id', '=', $role_id)->get();
    }
}
