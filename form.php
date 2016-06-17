<?php

Class form {
	
	public function dropdown($locSuspArray, $type){
		
		
		print "<select name=" . $type . ">";
		foreach($locSuspArray as $locSusp){
			if ($type == "Location"){
				$valName = $locSusp->getLocationName();
			} else {
				$valName = $locSusp->getName();
			}
			
			print "<option value=" . $valName . ">" . $valName . "</option>";
		}
		print "</select>";
	}
	
}