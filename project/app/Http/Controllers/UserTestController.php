<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Option;
use App\Usertest;
use App\Useranswer;
use Auth;
use Redirect;

class UserTestController extends Controller
{
    public function view($test_name,$test_id)
{	
	$tests = Test::where('name',$test_name,)->get();
	$questions = Question::where('test_id',$test_id)->get();
	$options = Option::all();
	
	return view('UserTest')->with('test',$test_name)->with('tests',$test_id)->with('questions',$questions)->with('options',$options);
}

public function store(Request $request, $test_id)
{	
	/*
	$questions = Question::where('test_id',$test_id)->get(); 
	$this->validate(request(),[
         'option'=>'required',
      ]);
		$option = $request->get('option');
	
	foreach ($questions as $question) {
		
		$correct_option = Option::where('question_id',$question->id)->where('isCorrect','1')->value('option');
	echo $question;	
	echo "<br/>";
	echo "<br/>";
	if($option[$i++]==$correct_option)
	{
		echo "True";
	}
	else
	{	
		
		echo "false";
	}
	echo "<br/>";
	echo "<br/>";
			}
			*/
	$i=0;
	$option = $request->get('option');
	foreach ($option as $question_id => $id) {
		$options[$i++] = $id;
	}
	if($option==0)
	{
		return redirect()->back()->with('message','Please answer all the questions')->withInput();

	}
	else
	{

	$count = count($option);
	}
	
	$questions = Question::where('test_id',$test_id)->count();

	if($count==$questions)
	{
		$this->validate($request, [ 'other_checkbox' => 'sometimes|required|array', 'other_checkbox.*' => 'required|accepted' ]);
	$questions = Question::where('test_id',$test_id)->get();
	$usertest = new Usertest([
         'user_id' => Auth::user()->id,
         'test_id' => $test_id,
      ]);
	
	$usertest->save();
	
	
		$usertest = Usertest::latest('id')->first();
	$j=0;
		$questions = Question::where('test_id',$test_id)->get();

		

		foreach($questions as $question)
		{
				$correct_option = Option::where('question_id',$question->id)->where('isCorrect','1')->value('option');
				
				$request_option[$j]= Option::where('id',$options[$j])->value('option');
				//echo ($request_option[$j++]);
				
			
				
				//dd($request_option);
				//echo $option;
				
				if($request_option[$j++]==$correct_option)
					{
						$isCorrect=1;
					}
					else
					{	
						$isCorrect=0;
					}
					$useranswer = new Useranswer
			([
				'usertests_id' => $usertest->id,
				'question_id' => $question->id,
				'isCorrect'=>$isCorrect,
			]);


			$useranswer->save();
			
		}
	
	return redirect()->route('result');
	

}
else
{
	
	return redirect()->back()->withInput()->with('message','Please answer all the questions');
}


}

}
