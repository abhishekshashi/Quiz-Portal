<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name','description'];

    public function questions()
    {
    	return $this->hasMany('App\Question');
    }
    public function usertests()
    {
    	return $this->hasMany('App\Usertest');
    }
}
