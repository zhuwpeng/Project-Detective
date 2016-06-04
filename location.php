<?php

class Location {
	 
	public $locationName;
	public $findableClues;
	
	public function __construct($locationName){
		$this->locationName = $locationName;
	}
	
	public function getFindableClues(){
		$this->generateClues();
		return $this->findableClues;
	}
	
	private function generateClues(){
		return $this->findableClues = rand(2,8);
	}
}