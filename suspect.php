<?php
class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate, $isCulprit){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
		$this->isCulprit = $isCulprit;
	}
	
	public function IsCulprit(){
		return $this->isCulprit;
	}
	
	public function setSuspectLoc($location){
		$this->suspectLoc = $location;
	}
	
	public function giveClues(){
		
	}
}