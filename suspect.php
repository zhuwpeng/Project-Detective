<?php
require_once "clue.php";

class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;
	private $suspectID;
	private $answerChance;
	private $answer;
	private $type = "Suspect";

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age, $isCulprit, $suspectID){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $age);
		$this->isCulprit = $isCulprit;
		$this->suspectID = $suspectID;
	}
	
	public function IsCulprit(){
		return $this->isCulprit;
	}
	
	public function setSuspectLoc($location){
		$this->suspectLoc = $location;
	}
	
	
	public function getAnswer($detectiveChar){
		if($detectiveChar < $this->charisma){
			$bonus = 5;
		} else {
			$bonus = 10;
		}
		if(rand(0,100) < ((($detectiveChar/$this->charisma)*15)+20)+$bonus){
			return true;
		}else{
			return false;
		}
	}
}