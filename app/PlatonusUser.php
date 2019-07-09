<?php

namespace App;

use Lang;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PlatonusUser extends Authenticatable
{
    public $connection = 'nitro';
    public $table = 'students';
    public $primaryKey = 'StudentID';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function username(){
        return $this->Login;
    }

    public function getAuthPassword(){
        return $this->Password;
    }

    public function codeProfession(){
        return (new PlatonusProfession())->getCode($this->ProfessionID);
    }

    public function nameProfession(){
        return (new PlatonusProfession())->getName($this->ProfessionID);
    }

    public function Sex(){
        return (new PlatonusSex())->getName($this->SexID);
    }

    public function Сitizenship(){
        return (new PlatonusСitizenship())->getName($this->sitizenshipID);
    }

    public function role(){
        return (new Roles())->getName(3);
    }

    public function roleId(){
        return 3;
    }

    public function modules(){
        $abilities = new Abilities();

        return $abilities->getModules(3);
    }

    public function groupsModules(){
        $group_modules = new GroupModules();

        $current_modules = $this->modules();

        $groups = array();

        for($i = 0; $i < count($current_modules); $i++)
        {
            $groupid_module = $current_modules[$i]->group_id;

            if($groupid_module != null)
            {
                $groups[$groupid_module][] = $current_modules[$i];
            }
            else
            {
                $groups['module_'.$current_modules[$i]->name][] = $current_modules[$i];
            }
        }

        return $groups;
    }
}
