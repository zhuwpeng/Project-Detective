<?php
include 'character.php';
include 'clue.php';
include 'detective.php';
include 'location.php';
include 'suspect.php';

class Game{
	
	public $locations;
	public $endGame;
	private $suspects;
	
	public function __construct(){
		$this->suspects = array();
		$this->generateObjects();
	}
	
	public function _newGame(){
		$this->location = $location;
		
	}
	
	private function generateObjects(){
		$numSusp = rand(3,6);
		
		$culprit = rand(1,$numSusp);
		
		for($i = 1 ; $i <= $numSusp; $i++){
			if($i == $culprit){
				$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', true, $i+1);
			}else{
				$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', false, $i+1);
			}
		}
	}
	
	public function getSuspects(){
		return $this->suspects;
	}
}