<?php

class Question {
	
	private $question;
	private $type = "Question";
	
	public function __construct($question){
		$this->question = $question;
	}
	
	public function getQuestion(){
		return $this->question;
	}
	
	public function getType(){
		return $this->type;
	}
	
}