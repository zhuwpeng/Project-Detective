<?php
class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;
	private $suspectID;
	private $answerChance;
	private $answer;
	private $Chance;

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate, $isCulprit, $suspectID){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
		$this->isCulprit = $isCulprit;
		$this->suspectID = $suspectID;
		$this->genSuspAnsChance();
	}
	
	public function IsCulprit(){
		return $this->isCulprit;
	}
	
	public function setSuspectLoc($location){
		$this->suspectLoc = $location;
	}
	
	public function genSuspAnsChance(){
		$Chance = rand(0,100);
	}
	
	public function getMaxAnswers(){
		return $this->$maxNumberOfAnswers;
	}
	
	public function getAnswer($detectiveCharisma){
		if($Chance < ((($detectiveCharisma/$charisma)*10)+20)){
			 $answer = new clue();
			 return $answer;
		}
	}
}