<?php

namespace App;
use Lang;

use Illuminate\Database\Eloquent\Model;

class PlatonusSex extends Model
{
    public $connection = 'nitro';
    public $table = 'sexes';
    public $primaryKey = 'ID';

    public function getName($id)
    {
        return $this->find($id)['NAME'.strtoupper(Lang::locale())];
    }
}
