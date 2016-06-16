<?php
include 'character.php';
include 'clue.php';
include 'detective.php';
include 'location.php';
include 'suspect.php';

class Game{
	
	public $endGame;
	private $suspects;
	private $locations;
	
	public function __construct(){
		$this->suspects = array();
		$this->locations = array();
		$this->generateSuspLoc();
	}
	
	public function _newGame(){
		$this->location = $location;
		
	}
	
	private function generateSuspLoc(){
		$numSusp = rand(3,6);
		$culprit = rand(1,$numSusp);
		
		for($i = 1; $i <= $numSusp; $i++){
			if($i == $culprit){
				$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', true, $i+1);
			}else{
				$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', false, $i+1);
			}
		}
		
		$numLoc = rand(2,4);
		$crimeScene = rand(1, $numLoc);
		
		for($i = 1; $i <= $numLoc; $i++){
			if($i == $crimeScene){
				$this->locations[$i] = new Location("Location $i", true);
			} else {
				$this->locations[$i] = new Location("Location $i", false);
			}
		}
	}
	
	public function getSuspects(){
		return $this->suspects;
	}
	
	public function getLocations(){
		return $this->locations;
	}
}