<?php

Class clue {
	private $type;
	private $points = array();
	private $name;
	private $culpritID;
	private $numberOfSusp;
	
	public function __construct($name, $type, $culpritID, $numberOfSusp){
		$this->from = $name;
		$this->type = $type;
		$this->numberOfSusp = $numberOfSusp;
		$this->culpritID = $culpritID;
		$this->setPoints($this->culpritID, $this->numberOfSusp);
	}
	
	public function displayClueDetails(){
		print $this->name . "<br>";
		print $this->type . "<br>";
	}
	
	public function setPoints($culpritID, $numberOfSusp){
		for($i = 1; $i <= $numberOfSusp; $i++){
			if ($i == $culpritID){
				$this->points[$i] = rand(2, 5);
			} else {
				$this->points[$i] = rand(0, 2);
			}
		}
	}
	
	public function getStats(){
		return $this->points;
	}
}