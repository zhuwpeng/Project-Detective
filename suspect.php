<?php
class Suspect extends Character {
	
	public $isCulprit;

	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate, $isCulprit){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $birthdate);
		$this->isCulprit = $isCulprit;
	}
}