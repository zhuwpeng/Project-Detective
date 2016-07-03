<?php

class Answer {
	
	private $questionID;
	private $suspectID;
	private $answer;
	
	public function __construct($questionID, $suspectID, $answer){
		$this->suspectID = $suspectID;
		$this->questionID = $questionID;
		$this->answer = $answer;
	}
	
	public function getAnswer(){
		return $this->answer;
	}
	
	public function getSuspectID(){
		return $this->suspectID;
	}
	
	public function getQuestionID(){
		return $this->questionID;
	}
}