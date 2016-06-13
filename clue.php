<?php

Class clue {
	
	private $ID;
	private $type;
	private $points;
	private $suspOrLoc;
	
	public function __construct($suspOrLoc, $type){
		$this->suspOrLoc = $suspOrLoc;
		$this->type = $type;
		$this->setCulpritChance($this->suspOrLoc);
	}
	
	public function setCulpritChance($suspOrLoc){
		if($this->type == "Suspect"){
			if($suspOrLoc->IsCulprit()){
				$points = rand(2, 5);
			} else {
				$points = rand(0, 2);
			}
		}else {
			
		}
	}
}