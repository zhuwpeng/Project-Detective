<?php

class Detective extends Character {
	public $clues;
	
	
	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
	}
	
	public function getClues() {
 		$intelligence = $this->intelligence;
 		$clues = $this->clues;
		if (0 < $intelligence  && $intelligence < 10) {
			$clues = rand(0,3);
		} elseif (10 < $intelligence && $intelligence < 20) {
			$clues = rand(1,5); 
		} else {
			$clues = rand(2,8);
		}
		
		print $clues;
	}
	
	public function Arrest($isCulprit) {
		if ($isCulprit) {
			print "The culprit has been arrested";
		} else {
			print "This is not the culprit you idiot!";
		}
	}
}