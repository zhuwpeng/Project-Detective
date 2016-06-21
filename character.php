<?php

class Character {
	
	private $name;
 	private $strength;
 	private $intelligence;
 	private $charisma;
 	private $gender;
 	private $age;
	
 	//Constructor
	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age) {
		$this->name = $name;
		$this->strength = $strength;
		$this->intelligence = $intelligence;
		$this->charisma = $charisma;
		$this->age = $age;
		$this->gender = $gender;
		
		if(empty(trim($this->age))){
			$this->age = rand(20,60);
		}
	}
	
	//Display character stats
	public function displayStats(){
// 		$age = $this->calculateAge($this->birthdate);
		print "Name: " . $this->name . "<br>";
		print "Age: " . $this->age . "<br>";
		print "Strength: " . $this->strength . "<br>";
		print "Intelligence: " . $this->intelligence . "<br>";
		print "Charisma: " . $this->charisma . "<br>";
		print "Gender: " . $this->gender . "<br>";
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getCharisma(){
		return $this->charisma;
	}
	
	public function getIntelligence(){
		return $this->intelligence;
	}
	
	public function getStrength(){
		return $this->strength;
	}
// 	public function calculateAge($birthday){
// 		$born = new DateTime("$birthday");
// 		$now = new DateTime("now");
// 		$age = $born->diff($now)->y;
// 		return $age;
// 	}
}