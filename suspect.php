<?php
class Suspect extends Character {
	
	public $suspectRate;

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
	}

	public function setSuspectRate(){
		
	}

}