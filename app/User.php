<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

class User extends Authenticatable
{
    public $table = 'users';
    public $primaryKey = 'id';
    public $timestamps = false;

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

    static public function loginUnique($login){
        return count( self::where( 'Login', '=', $login )->get() ) == 0 ? true : false;
    }

    static public function countUsersByRole($role_id){
        return self::where( 'role_id', '=', $role_id )->get(DB::raw('COUNT(1) AS number'))[0] ;
    }

    public function role(){
        return (new Roles())->getName($this->role_id);
    }

    public function roleId(){
        return $this->role_id;
    }

    public function modules(){
        $abilities = new Abilities();

        return $abilities->getModules($this->role_id);
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
