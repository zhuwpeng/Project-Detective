<?php

class Detective extends Character {

	private $time = 12;
	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $age);
	}
	
//Random test that needs to be changed
// 	public function getClues() {
//  		$intelligence = $this->intelligence;
//  		$clues = $this->clues;
// 		if (0 < $intelligence  && $intelligence < 10) {
// 			$clues = rand(0,3);
// 		} elseif (10 < $intelligence && $intelligence < 20) {
// 			$clues = rand(1,5); 
// 		} else {
// 			$clues = rand(2,8);
// 		}
// 		print $clues;
// 	}
	
	public function setName($newName){
		$this->name = $newName;
	}
	
	public function setStr($newStr){
		$this->strength = $newStrength;
	}
	
	public function setInt($newInt){
		$this->intelligence = $newInt;
	}
	
	public function setChar($newChar){
		$this->charisma = $newChar;
	}
	
	public function setGender($newGender){
		$this->gender = $newGender;
	}
	
	public function setAge($newAge){
		$this->age = $newAge;
	}
	
	public function getTime(){
		return $this->time;
	}
	
	public function reduceTime($reduction){
		//Reduce available time after each action
		$this->time = $this->time - $reduction;
		
	}
	
	public function Investigate($location, $numOfSusp, $culpritID){
		//Get clues from location
		$clue = $location->findClues($this->intelligence, $this->strength, $numOfSusp, $culpritID);
	}
	
	public function Interview($suspect, $numOfSusp, $culpritID){
		//Get clues from suspect
		return $suspect->getAnswer($this->charisma, $numOfSusp, $culpritID);
	}
	
// 	public function MoveTo($location){
// 		$this->currentLocation = $location;
// 	}
	
	public function ShowStats($allClues){
		//display numbers of each suspect to determine culprit
		
	}
	
	public function Arrest($isCulprit) {
		if ($isCulprit) {
			print "The culprit has been arrested";
		} else {
			print "This is not the culprit you idiot!";
		}
	}
}