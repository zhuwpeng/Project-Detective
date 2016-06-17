<?php
include('game.php');
include('form.php');
session_start();

// $array = array();

// $culprit = new Suspect("Culprit", 5, 5, 2, "Doge", '1950-09-12', True, 1);
// $person = new Detective("dedede", 2, 10, 4, "Male", '1991-03-25');

// $person->displayStats();
// $person->arrest($culprit->IsCulprit());

// $location = new location("Forest", true);

// $info = $location->getLocData();

// $array[] = $person->Interview($culprit);

$form = new form();

$suspects = $_SESSION['suspects'];
$locations = $_SESSION['locations'];
$detective = $_SESSION['detective'];

foreach($suspects as $suspect){
	$suspect->displayStats();
	print $suspect->isCulprit();
	print "<br><br>";
}

foreach($locations as $location){
	$location->DisplayLocData();
	print $location->isCrimeScene();
	print "<br><br>";
}

$detective->displayStats();
$clues = array();
$clues[] = $detective->interview($suspects[1]);

var_dump($clues);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form method = "POST" action="index.php">
		<?php 
		$form->dropdown($suspects, "Suspect");
		$form->dropdown($locations, "Location");
		?>
	</form>
</body>
</html>