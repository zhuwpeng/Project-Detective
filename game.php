<?php
include 'character.php';
include 'clue.php';
include 'detective.php';
include 'location.php';
include 'suspect.php';

class Game{
	
	public $endGame;
	private $suspects;
	private $numSusp;
	private $locations;
	private $culprit;
	private $crimeScene;
	
	public function __construct(){
		$this->suspects = array();
		$this->locations = array();
		$this->generateSuspLoc();
	}
	
	public function getSuspects(){
		return $this->suspects;
	}
	
	public function getLocations(){
		return $this->locations;
	}
	
	public function getCulprit(){
		return $this->culprit;
	}
	
	public function getNumberOfSuspects(){
		return $this->numSusp;
	}
	
	public function getCrimescene(){
		return $this->crimeScene;
	}
	
	public function dropdown($locSuspArray, $type){
		$numObjects = count($locSuspArray);
	
		print "<select name=" . $type . ">";
		for($i = 1; $i <= $numObjects; $i++){
			if ($type == "Location"){
				$Name = $locSuspArray[$i]->getLocationName();
			} else {
				$Name = $locSuspArray[$i]->getName();
			}
				
			print "<option value=$i>" . $Name . "</option>";
		}
		print "</select>";
	}
	
	public function submitButton($action){
		print "<input type=\"submit\" name=" . strtolower($action) . " value=" . ucfirst(strtolower($action)) . ">";
	}
	
	public function action($action, $detective, $suspLocNum, $suspLocArray){
		if($action == "Interview"){
			return $detective->interview($suspLocArray[$suspLocNum], $this->numSusp, $this->culprit);
		} else {
			return $detective->investigate($suspLocArray[$suspLocNum], $this->numSusp, $this->culprit);
		}
	}
	
	private function generateSuspLoc(){
		$this->numSusp = rand(3,6);
		$this->culprit = rand(1, $this->numSusp);
	
		$this->numLoc = rand(2,4);
		$this->crimeScene = rand(1, $this->numLoc);
	
		for($i = 1; $i <= $this->numLoc; $i++){
			if($i == $this->crimeScene){
				$this->locations[$i] = new Location("Location $i", true, $i);
			} else {
				$this->locations[$i] = new Location("Location $i", false, $i);
			}
		}
	
		for($i = 1; $i <= $this->numSusp; $i++){
			if($i == $this->culprit){
				$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', true, $i+1, $crimeScene);
			}else{
				$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', false, $i+1, rand(1, $numLoc));
			}
		}
	}
}