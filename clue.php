<?php

Class clue {
	
	public $areaID;
	public $suspectID;
	private $ID;
	private $maxClues;
	private $type;
	private $foundClues;
	
	public function __construct($ID, $maxClues, $type){
		$this->ID = $ID;
		$this->maxClues = $maxClues;
		$this->type = $type;
	}
	
	public function setCulpritChance($suspArea){
		
	}
	

}