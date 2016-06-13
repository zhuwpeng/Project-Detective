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
	
	public function getLocData(){
		return array($this->locationName, $this->findableClues);
	}
	
	private function getCrimeScene(){
		return $this->isCrimeScene;
	}
	
	private function genFindableClues(){
		$this->findableClues = rand(2,8);
	}
	
	public function findClues($detectiveInt, $detectivePow, $culprit){
		$newClue = new clue($this, $this->type);
	}
}