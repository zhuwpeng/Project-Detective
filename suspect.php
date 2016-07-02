<?php
require_once "clue.php";

class Suspect extends Character {
	
	private $isCulprit;
	private $suspectLoc;
	private $suspectID;
	private $answers = array();
	private $shirt;
	private $pants;
	private $shoes;
	private $type = "Suspect";
	

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age, $isCulprit, $suspectID, $suspectLoc, $shirt, $pants, $shoes){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $age);
		$this->isCulprit = $isCulprit;
		$this->suspectID = $suspectID;
		$this->suspectLoc = $suspectLoc;
		$this->shirt = $shirt;
		$this->pants = $pants;
		$this->shoes = $shoes;
	}
	
	public function isCulprit(){
		return $this->isCulprit;
	}
	
	public function getSuspectLoc(){
		return $this->suspectLoc;
	}
	
	public function getSuspectID(){
		return $this->suspectID;
	}
	
	public function getClothing(){
		print "Shirt color: " . $this->shirt . "<br>";
		print "Pants color: " . $this->pants . "<br>";
		print "Shoes color: " . $this->shoes . "<br><br>";
	}
	
	public function getAnswer($question){
		
	}
}