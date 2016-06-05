<?php

include('character.php');
include('detective.php');
include('location.php');
include('suspect.php');



$culprit = new Suspect("Culprit", 5, 5, 2, "Doge", '1950-09-12', True);
$person = new Detective("dedede", 2, 3, 4, "Male", '1991-03-25');

$person->displayStats();
$person->arrest($culprit->IsCulprit());

$location = new location("Forest");

$info = $location->getLocData();

foreach($info as $data){
	print $data;
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form method = "POST" action="index.php">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
		<input type="submit" name="submit" value="Go">
	</form>
</body>
</html>