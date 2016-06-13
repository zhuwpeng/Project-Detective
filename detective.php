<?php

class Detective extends Character {
	private $clues = array();
	private $currentLocation;
	
	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
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
	
	public function Investigate($location){
		//Get clues from location
		$clue = $location->findClues($this->intelligence, $this->power);
	}
	
	public function Interview($suspect){
		//Get clues from suspect
		return $suspect->getAnswer($this->charisma, $this->intelligence);
	}
	
	public function MoveTo($location){
		$this->currentLocation = $location;
	}
	
	public function ShowStats(){
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