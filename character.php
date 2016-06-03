<?php

class Character {
	
	public $name;
	
 	public $strength;
 	public $intelligence;
 	public $charisma;
 	public $gender;
 	public $birthdate;
	
 	//Constructor
	public function __construct($name, $strength, $intelligence, $charisma, $gender, $birthdate) {
		$this->name = $name;
		$this->strength = $strength;
		$this->intelligence = $intelligence;
		$this->charisma = $charisma;
		$this->birthdate = $birthdate;
		$this->gender = $gender;
	}
	
	//Display character stats
	public function displayStats(){
		$age = $this->calculateAge($this->birthdate);
		print "Name: " . $this->name . "<br>";
		print "Age: " . $age . "<br>";
		print "Strength: " . $this->strength . "<br>";
		print "Intelligence: " . $this->intelligence . "<br>";
		print "Charisma: " . $this->charisma . "<br>";
		print "Gender: " . $this->gender . "<br>";
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function calculateAge($birthday){
		$born = new DateTime("$birthday");
		$now = new DateTime("now");
		$age = $born->diff($now)->y;
		return $age;
	}
}