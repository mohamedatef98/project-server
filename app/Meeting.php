<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
     public static function confirmed(int $userId, Meeting $meeting): bool
    {
        $confirmedUsers = explode(',',$meeting->users);

        if(array_search($userId, $confirmedUsers) !== false)
            return true;
        return false;
    }
}
