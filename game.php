<?php
include 'character.php';
include 'clue.php';
include 'detective.php';
include 'location.php';
include 'suspect.php';
include 'question.php';
include 'log4php/Logger.php';

Logger::configure('loggingconfiguration.xml');

class Game{
	
	public $endGame;
	private $suspects = array();
	private $numSusp;
	private $colors = array("Blue", "Red", "Yellow", "Black", "Green", "Purple", "Orange");
	private $locations = array();
	private $numLoc;
	private $questionString = array();
	private $questions = array();
	private $culprit;
	private $crimeScene;
	private $log;
	
	public function __construct(){
		$this->suspects = array();
		$this->locations = array();
		$log = Logger::getLogger(__CLASS__);
		$this->log = $log;
		$this->generateSuspLocQues();
		
	}
	
	public function getSuspects(){
		return $this->suspects;
	}
	
	public function getLocations(){
		return $this->locations;
	}
	
	public function getQuestions(){
		return $this->questions;
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
	
	public function dropdown($array, $type){
		$numObjects = count($array);
		
		print "<select name=" . $type . ">";
		for($i = 1; $i <= $numObjects; $i++){
			if ($type == "Location"){
				$Name = $array[$i]->getLocationName();
			} elseif($type == "Question") {
				$Name = $array[$i]->getQuestion();
			}else {
				$Name = $array[$i]->getName();
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
	
	private function generateSuspLocQues(){
		$this->numSusp = rand(3,6);
		$this->culprit = rand(1, $this->numSusp);
	
		$this->numLoc = rand(2,4);
		$this->crimeScene = rand(1, $this->numLoc);
		
		$this->questionString[1] = "Where were you when the crime happened?";
		$this->questionString[2] = "Who do you think is the culprit?";
		$this->questionString[3] = "Can you describe the culprit?";
		
		$this->log->info("Generating Locations and Suspects and Questions");
		$this->log->info("Locations generated: " . $this->numLoc);
		
		for ($i = 1; $i <= $this->numLoc; $i++){
			if($i == $this->crimeScene){
				$crime = true;
			} else {
				$crime = false;
			}
			
			$this->locations[$i] = new Location("Location $i", $crime, $i);
			$this->log->info("Location " . $this->locations[$i]->getLocationID() . ", Crimescene: " . $this->locations[$i]->isCrimeScene() . ", Findable Clues: " . $this->locations[$i]->getFindableClues());
		}
	
		$this->log->info("Suspects generated: " . $this->numSusp);
		for ($i = 1; $i <= $this->numSusp; $i++){
			if($i == $this->culprit){
				$killer = True;
				$lastSeen = $this->crimeScene;
			}else{
				$killer = False;
				$lastSeen = rand(1, $this->numLoc);
			}
			
			$clothing = array();
			
			for($x = 0; $x < 3 ; $x++){
				$clothing[$x] = rand(0, count($this->colors));
			}
			
			$this->suspects[$i] = new Suspect("Suspect $i", 10, 10, 10, rand(0,1) == 1 ? "male": "female", '', $killer, $i+1, $lastSeen, $this->colors[$clothing[0]], $this->colors[$clothing[1]], $this->colors[$clothing[2]]);
			$this->log->info("Suspect " . $i . ", Stats str/int/char: " . $this->suspects[$i]->getStrength() . ", " . $this->suspects[$i]->getIntelligence() . ", " . $this->suspects[$i]->getCharisma() . ", Gender: " .  $this->suspects[$i]->getGender(). ", Killer: " . $this->suspects[$i]->isCulprit() . ", Last Seen: " .  $this->suspects[$i]->getSuspectLoc() . ", Clothing Shirt/Pants/Shoes: " . $this->colors[$clothing[0]] . ", " . $this->colors[$clothing[1]] . ", " . $this->colors[$clothing[2]]);
		}
		
		for ($i = 1; $i <= count($this->questionString); $i++){
			$this->questions[$i] = new Question($this->questionString[$i]);
			$this->log->info("Question object: " . $this->questionString[$i] . " created");
		}
	}
}