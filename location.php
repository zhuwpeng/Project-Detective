<?php

class Location {
	 
	private $locationName;
	private $findableClues;
	
	
	public function __construct($locationName){
		$this->locationName = $locationName;
		$this->genFindableClues();
	}
	
	public function getLocData(){
		return array($this->locationName, $this->findableClues);
	}
	
	private function genFindableClues(){
		$this->findableClues = rand(2,8);
	}
	
	public function findClues(){

	}
}