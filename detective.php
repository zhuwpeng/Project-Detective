<?php

class Detective extends Character {

	
	public function __construct($name, $strength, $intelligence, $charisma, $gender, $age){
		parent::__construct($name, $strength, $intelligence, $charisma, $gender, $age);
	}
	
//Random test that needs to be changed
// 	public function getClues() {
//  		$intelligence = $this->intelligence;
//  		$clues = $this->clues;
// 		if (0 < $intelligence  && $intelligence < 10) {
// 			$clues = rand(0,3);
// 		} elseif (10 < $intelligence && $intelligence < 20) {
// 			$clues = rand(1,5); 
// 		} else {
// 			$clues = rand(2,8);
// 		}
// 		print $clues;
// 	}
	
	public function setName($newName){
		$this->name = $newName;
	}
	
	public function setStr($newStr){
		$this->strength = $newStrength;
	}
	
	public function setInt($newInt){
		$this->intelligence = $newInt;
	}
	
	public function setChar($newChar){
		$this->charisma = $newChar;
	}
	
	public function setGender($newGender){
		$this->gender = $newGender;
	}
	
	public function setAge($newAge){
		$this->age = $newAge;
	}
	
	public function Investigate($location, $numOfSusp, $culprit){
		//Get clues from location
		return $location->findClues($this->intelligence, $this->strength, $numOfSusp, $culprit);
	}
	
	public function Interview($suspect, $culprit, $questionID, $numLoc, $numSusp, $colors){
		//Get clues from suspect
		return $suspect->getAnswer($this->charisma, $culprit, $questionID, $numLoc, $numSusp, $colors);
	}
	
// 	public function MoveTo($location){
// 		$this->currentLocation = $location;
// 	}
	
// 	public function ShowStats($allClues){
// 		//display numbers of each suspect to determine culprit
// 		$stats = array();
		
// // 		foreach($allClues as $subarray){
// // 			foreach($subarray as $answer){
// // 				foreach($answer as $clueObject){
// // 					$stats[] = $clueObject->getStats();
// // 				}
// // 			}
// // 		}

// 		foreach($allClues as $subarray){
// 				foreach($subarray as $clueObject){
// 					$stats[] = $clueObject->getStats();
// 			}
// 		}
		
// 		$final = array();
		
// 		array_walk_recursive($stats, function($item, $key) use (&$final){$final[$key] = isset($final[$key])?$item + $final[$key] : $item;});
		
// 		return $final;
// 	}
	
	public function Arrest($isCulprit) {
		if ($isCulprit) {
			print "<h1>The culprit has been arrested!</h1>";
		} else {
			print "<h1>That was not the culprit you idiot!</h1>";
		}
	}
}