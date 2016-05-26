<?php

class Character {
	
	public $name;
	
// 	public $strength;
// 	public $intelligence;
// 	public $charisma;
	
	public function __construct($name) {
		$this->name = $name;
	}
	
	public function getName() {
		return $this->name;
	}
}