<?php
//Kindoff obsolete class; Probably going to remove this class
class Question {
	
	private $question;
	private $questionID;
	private $type = "Question";
	
	public function __construct($questionID, $question){
		$this->question = $question;
		$this->questionID = $questionID;
	}
	
	public function getQuestion(){
		return $this->question;
	}
	
	public function getQuestionID(){
		return $this->questionID;
	}
	
	public function getType(){
		return $this->type;
	}
	
}