<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function submissions(){
        return $this->hasMany('\App\Submission');
    }

    public function hasSubmitted(User $user){
        $submissions = $this->submissions;

        if($submissions->where("user_id", $user->id)->count() > 0)
            return true;
        return false;

    }
}
