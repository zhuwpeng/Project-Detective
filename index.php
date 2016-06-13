<?php
include('game.php');

// $array = array();

// $culprit = new Suspect("Culprit", 5, 5, 2, "Doge", '1950-09-12', True, 1);
// $person = new Detective("dedede", 2, 10, 4, "Male", '1991-03-25');

// $person->displayStats();
// $person->arrest($culprit->IsCulprit());

// $location = new location("Forest", true);

// $info = $location->getLocData();

// $array[] = $person->Interview($culprit);

$game = new game();

foreach($game->suspects as $suspect){
	$suspect->displayStats();
	print $suspect->isCulprit();
	print "<br><br>";
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