<?php
include 'character.php';
include 'clue.php';
include 'detective.php';
include 'location.php';
include 'suspect.php';
include 'log4php/Logger.php';

Logger::configure('loggingconfiguration.xml');

class Game{
	
	public $endGame;
	private $suspects;
	private $numSusp;
	private $locations;
	private $culprit;
	private $crimeScene;
	private $log;
	
	public function __construct(){
		$this->suspects = array();
		$this->locations = array();
		$log = Logger::getLogger(__CLASS__);
		$this->log = $log;
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
			return $detective->Interview($suspLocArray[$suspLocNum], $this->numSusp, $this->culprit);
		} else {
			return $detective->Investigate($suspLocArray[$suspLocNum], $this->numSusp, $this->culprit);
		}
	}
	
	private function generateSuspLoc(){
		$this->numSusp = rand(3,6);
		$this->culprit = rand(1, $this->numSusp);
	
		$this->numLoc = rand(2,4);
		$this->crimeScene = rand(1, $this->numLoc);
		
		$this->log->info("Generating Locations and Suspects");
		$this->log->info("Locations generated: " . $this->numLoc);
		for($i = 1; $i <= $this->numLoc; $i++){
			if($i == $this->crimeScene){
				$crime = true;
			} else {
				$crime = false;
			}
			
			$this->locations[$i] = new Location("Location $i", $crime, $i);
			$this->log->info("Location " . $this->locations[$i]->getLocationID() . ", Crimescene: " . $this->locations[$i]->isCrimeScene() . ", Findable Clues: " . $this->locations[$i]->getFindableClues());
		}
	
		$this->log->info("Suspects generated: " . $this->numSusp);
		for($i = 1; $i <= $this->numSusp; $i++){
			if($i == $this->culprit){
				$killer = True;
				$lastSeen = $this->crimeScene;
			}else{
				$killer = False;
				$lastSeen = rand(1, $this->numLoc);
			}
			
			$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', $killer, $i+1, $lastSeen);
			$this->log->info("Suspect " . $i . ", Stats str/int/char: " . $this->suspects[$i]->getStrength() . ", " . $this->suspects[$i]->getIntelligence() . ", " . $this->suspects[$i]->getCharisma() . ", Gender: " .  $this->suspects[$i]->getGender(). ", Killer: " . $this->suspects[$i]->isCulprit() . ", Last Seen: " .  $this->suspects[$i]->getSuspectLoc());
		}
	}
}