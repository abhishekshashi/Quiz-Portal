<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['test_id','question'];
    public function options()
    {
    	return $this->hasMany('App\Option');
    }
    public function question()
    {
    	return $this->belongsTo('App\Test');
    }
}
