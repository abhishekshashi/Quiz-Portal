<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;

class AdminTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
   {
      $tests = new Test([
        $tests = Test::all(),]);
      return view('test',['tests'=>$tests]);
   }
   public function store(Request $request)
   {
      $this->validate(request(),[
         'name'=>'required',
         'description'=>'required',
      ]);
      $test = new Test([
         'name' =>$request->get('name'),
         'description' =>$request->get('description'),
      ]);
      $test->save();
      return redirect()->route('questions');
   }
   public function add_view($test_name , $test_id)
   {  $test = Test::where('id',$test_id)->first();
   //dd($test);
      $question = Question::where('test_id',$test_id)->get();
      //dd($question);
      return view('edit')->with('test',$test)->with('questions',$question);
   }
   public function destroy($id) {

    $test = Test::where('id',$id)->delete();
    // $option = Option::where('question_id',$id)->get();
    // //dd($option);
    // $option->delete();
    // $question->delete();

    return redirect()->back();
}
}
