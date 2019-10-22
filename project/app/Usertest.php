<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertest extends Model
{	
	protected $fillable = ['user_id','test_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function test()
    {
        return $this->belongsTo('App\Test');
    }
	public function useranswers()
    {
        return $this->hasMany('App\Useranswer');
    }
    
}
