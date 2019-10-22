<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Usertest;
use App\Useranswer;

class UserResultController extends Controller
{    
	public function view()
	{
		$user_id = Auth::user()->id;
		$user_test = Usertest::where('user_id',$user_id)->latest('id')->first();
		$user_answer = Useranswer::where('usertests_id',$user_test->id)->where('isCorrect','1')->count();
		$user_answers = Useranswer::where('usertests_id',$user_test->id)->count();
		//echo $user_answers;
		return view('result')->with('user_answer',$user_answer)->with('user_answers',$user_answers);
	}
}
