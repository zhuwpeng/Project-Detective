<?php

class Location {
	 
	private $locationName;
	private $findableClues;
	private $newClue;
	private $isCrimeScene;
	private $type = "Location";
	
	public function __construct($locationName, $isCrimeScene){
		$this->locationName = $locationName;
		$this->isCrimeScene = $isCrimeScene;
		$this->genFindableClues();
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
	
	private function genFindableClues(){
		$this->findableClues = rand(2,8);
	}
	
	public function findClues($detectiveInt, $detectivePow){
		
	}
}