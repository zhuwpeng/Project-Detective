<?php

Class form {
	
	public function dropdown($locSuspArray, $type){
		$numObjects = count($locSuspArray);
		
		print "<select name=" . $type . ">";
		for($i = 1; $i <= $numObjects; $i++){
			if ($type == "Location"){
				$valName = $locSuspArray[$i]->getLocationName();
			} else {
				$valName = $locSuspArray[$i]->getName();
			}
			
			print "<option value=$i>" . $valName . "</option>";
		}
		print "</select>";
	}
	
}