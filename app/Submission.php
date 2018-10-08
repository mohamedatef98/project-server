<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['user_id', 'task_id', 'files'];
    public function task(){
        return $this->belongsTo('\App\Task');
    }

    public function user(){
        return  $this->belongsTo('\App\User');
    }

}
