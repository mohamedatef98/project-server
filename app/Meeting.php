<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{


    public function hasConfirmed(User $user){
        $confirmedUsers = explode(',',$this->users);

        if(array_search($user->id, $confirmedUsers) !== false)
            return true;
        return false;
    }
}
