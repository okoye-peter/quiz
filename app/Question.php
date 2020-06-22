<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function course(){
        return $this->hasOne(Course::class);
    }
}
