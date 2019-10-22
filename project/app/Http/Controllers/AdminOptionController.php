<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Question;
use App\User;


class AdminOptionController extends Controller
{ 
    public function view()
   {
      $option = new Option([
        $questions = Question::latest('id')->first(),]);
      return view('option',['questions'=>$questions]);

   }
   public function store(Request $request)
   {
      $this->validate(request(),[
         'option'=>'required',
         'isCorrect'=>'required',
      ]);
      $option = new Option([
          $question = Question::latest('id')->first(),
         'question_id' =>$question->id,
         'option' =>$request->get('option'),
         'isCorrect'=>$request->get('isCorrect'),
      ]);
      $option->save();
      return redirect()->route('options');
   }
}
