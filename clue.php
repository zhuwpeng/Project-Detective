<?php

Class clue {
	
	private $ID;
	private $type;
	private $points
	private $suspOrLoc;
	
	public function __construct($suspOrLoc, $type){
		$this->suspOrLoc = $suspOrLoc;
		$this->type = $type;
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
	
	public function genStats(){
		
	}

}