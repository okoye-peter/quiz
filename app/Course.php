<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function questions(){
        return $this->hasMany(Question::class);
    }

}
