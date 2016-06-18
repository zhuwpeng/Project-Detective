<?php
require_once "clue.php";

class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;
	private $suspectID;
	private $answers = array();
	private $type = "Suspect";

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age, $isCulprit, $suspectID, $suspectLoc){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $age);
		$this->isCulprit = $isCulprit;
		$this->suspectID = $suspectID;
		$this->suspectLoc = $suspectLoc;
	}
	
	public function isCulprit(){
		return $this->isCulprit;
	}
	
	public function getSuspectLoc(){
		return $this->suspectLoc;
	}
	
	public function getSuspectID(){
		return $this->suspectID;
	}
	
	public function getAnswer($detectiveChar, $numOfSusp, $culpritID){
		if($detectiveChar < $this->charisma){
			$bonus = 5;
		} else {
			$bonus = 10;
		}
		
		if(rand(0,100) < ((($detectiveChar/$this->charisma)*15)+20)+$bonus){
			$foundAns = rand(1,3);
		}else{
			$foundAns = rand(0,1);
		}
		
		for($i = 0; $i < $foundAns; $i++){
			 $this->answers[$i] = new clue($this->name, $this->type, $numOfSusp, $culpritID);
		}
		
		return $this->answers;
	}
}