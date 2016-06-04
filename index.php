<?php

include('character.php');
include('detective.php');
include('location.php');


$person = new Detective("dedede", 2, 3, 4, "Male", '1991-03-25');

$person->displayStats();
$location1 = new Location("Test");
$obtainableClues = $location1->getFindableClues();


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