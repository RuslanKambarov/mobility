<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public $table = 'notification';
    public $primaryKey = 'id';
    public $timestamps = false;

    public function get($id)
    {
        return $this->find($id);
    }

    static public function getMessages($user_id)
    {
        return self::select('notification.id as notify_id', 'notification.*', 'logs.*')
                    ->leftjoin('logs', 'notification.log_id', '=', 'logs.id')
                    ->where('notification.user_id', '=', $user_id)
                    ->where('state', '=', 0)
                    ->orderBy('notify_id', 'desc')
                    ->get();
    }

    static public function getMessagesTake($user_id, $num)
    {
        return self::select('notification.id as notify_id', 'notification.*', 'logs.*')
                    ->leftjoin('logs', 'notification.log_id', '=', 'logs.id')
                    ->where('notification.user_id', '=', $user_id)
                    ->where('state', '=', 0)
                    ->take($num)
                    ->orderBy('notify_id', 'desc')
                    ->get();
    }

    static public function getMessagesCount($user_id)
    {
        return count(self::leftjoin('logs', 'notification.log_id', '=', 'logs.id')
                    ->where('notification.user_id', '=', $user_id)
                    ->where('state', '=', 0)
                    ->get());
    }
}
