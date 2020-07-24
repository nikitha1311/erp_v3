<?php

namespace App\Classes;

class Notification
{

    public static function success($msg)
    {
        session()->flash('notification',[
            'type' => 'success',
            'msg' => $msg
        ]);
    }

    public static function error($msg)
    {
        session()->flash('notification',[
            'type' => 'error',
            'msg' => $msg
        ]);
    }

}
