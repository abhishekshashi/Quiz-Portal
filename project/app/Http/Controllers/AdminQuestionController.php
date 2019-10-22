<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Test;
use App\Option;

class AdminQuestionController extends Controller
{
    public function view()
   {  
      $question = new Question([
        $tests = Test::latest('id')->first(),]);
      return view('questions',['tests'=>$tests]);
   }
    public function store(Request $request)
   {
      $this->validate(request(),[
         'question'=>'required',
      ]);
      $question = new Question([

          $test = Test::latest('id')->first(),
         'test_id' =>$test->id,
         'question' =>$request->get('question'),
      ]);
      $question->save();
      return redirect()->route('options');
   }
   public function add_question(Request $request , $test_id)
   {
      $question = new Question([

      
         'test_id' =>$test_id,
         'question' =>$request->get('question'),
      ]);
      $question->save();
      return redirect()->route('options');
   }
   public function destroy($id) {

    $question = Question::where('id',$id)->delete();
    // $option = Option::where('question_id',$id)->get();
    // //dd($option);
    // $option->delete();
    // $question->delete();

    return redirect()->back();

}
}
