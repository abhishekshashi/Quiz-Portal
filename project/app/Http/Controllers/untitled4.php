
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