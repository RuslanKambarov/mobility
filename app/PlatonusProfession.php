<?php

namespace App;
use Lang;

use Illuminate\Database\Eloquent\Model;

class PlatonusProfession extends Model
{
    public $connection = 'nitro';
    public $table = 'professions';
    public $primaryKey = 'professionID';

    public function getCode($id)
    {
        return $this->find($id)->code;
        //return $this->where($this->primaryKey, '=', $id)->first()->professionNameRU;
    }

    public function getName($id, $lang = null)
    {
        return $this->find($id)['professionName'.strtoupper(Lang::locale())];
    }
}
