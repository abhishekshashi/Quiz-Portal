<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useranswer extends Model
{	
	protected $fillable = ['usertests_id','question_id','isCorrect'];

    public function usertest()
    {
    	return $this->belongsTo('App\Usertest');
    }
}
