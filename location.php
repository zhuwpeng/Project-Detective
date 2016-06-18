<?php

class Location {
	 
	private $locationName;
	private $locationID;
	private $findableClues;
	private $requiredInt;
	private $requiredStr;
	private $newClue;
	private $isCrimeScene;
	private $type = "Location";
	
	public function __construct($locationName, $isCrimeScene, $locationID){
		$this->locationName = $locationName;
		$this->isCrimeScene = $isCrimeScene;
		$this->locationID = $locationID;
		$this->genFindableClues();
		$this->requiredInt = rand(5,20);
		$this->requiredStr = rand(10,25);
	}
	
	public function DisplayLocData(){
		print "Location name: " . $this->locationName . "<br>";
		print "Findable Clues: " . $this->findableClues . "<br>";
	}
	
	public function isCrimeScene(){
		return $this->isCrimeScene;
	}
	
	public function getLocationName(){
		return $this->locationName;
	}
	
	public function getLocationID(){
		return $this->locationID;
	}
	
	private function genFindableClues(){
		$this->findableClues = rand(2,8);
	}
	
	public function findClues($detectiveInt, $detectiveStr){
		if($detectiveInt < $this->requiredInt){
			$bonus = 5;
		} else {
			$bonus = 10;
		}
		
		if(rand(0,100) < ((($detectiveChar/$this->requiredInt)*15)+20)+$bonus){
			return true;
		}else{
			return false;
		}
	}
}