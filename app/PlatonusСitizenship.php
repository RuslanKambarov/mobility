<?php

namespace App;
use Lang;

use Illuminate\Database\Eloquent\Model;

class PlatonusСitizenship extends Model
{
    public $connection = 'nitro';
    public $table = 'sitizenship_states';
    public $primaryKey = 'id';

    public function getName($id)
    {
        return $this->find($id)['name'.Lang::locale()];
    }
}
