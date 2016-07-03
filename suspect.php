<?php
require_once "clue.php";

class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;
	private $suspectID;
	private $answers = array();
	private $shirt;
	private $pants;
	private $shoes;
	private $clothing;
	private $type = "Suspect";

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age, $isCulprit, $suspectID, $suspectLoc, $clothing){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $age);
		$this->isCulprit = $isCulprit;
		$this->suspectID = $suspectID;
		$this->suspectLoc = $suspectLoc;
		$this->clothing = $clothing;
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
	
	public function getClothing(){
		return $this->clothing;
	}
	
	public function getAnswer($detectiveChar, $culprit, $questionID, $numLoc, $numSusp, $colors){
		
		$correctAnswer = false;
		
		if ($detectiveChar > $this->charisma){
			if(rand(1, 100) < 60){
				$correctAnswer = true;
			}
		} else {
			if (rand(1, 100) < 30) {
				$correctAnswer = true;
			}
		}
		
		switch($questionID){
			case 1: 
				if (!$correctAnswer) {
					$answer = rand(1, $numLoc);
				} else {
					$answer = $this->suspectLoc;
				}
				
			case 2:
				if (!$correctAnswer) {
					$answer = rand(1, $numSusp);
				} else {
					$answer = $culprit->getSuspectID();
				}
				
			case 3:
				if (!$correctAnswer) {
					$numCol = count($colors) - 1;
					$answer = rand(0, $numCol);
				} else {
					$answer = $culprit->getClothing();
				}
		}
		
		return new Answer($questionID, $this->suspectID, $answer);
	}
}