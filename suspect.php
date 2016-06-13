<?php
require_once "clue.php";

class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;
	private $suspectID;
	private $answerChance;
	private $answer;
	private $type = "Suspect";

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate, $isCulprit, $suspectID){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
		$this->isCulprit = $isCulprit;
		$this->suspectID = $suspectID;
	}
	
	public function IsCulprit(){
		return $this->isCulprit;
	}
	
	public function setSuspectLoc($location){
		$this->suspectLoc = $location;
	}
	
	
	public function getAnswer($detectiveChar, $detectiveInt){
		
		if($this->intelligence < $detectiveInt){
			if(rand(0,100) < ((($detectiveChar/$this->charisma)*15)+20)){
				$answer = true;
			} else {
				$answer = false;
			}
			return $answer;
		}
	}
}