<?php
include 'character.php';
include 'clue.php';
include 'detective.php';
include 'location.php';
include 'suspect.php';
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

if(isset($_SESSION['clues'])){
	$clues = $_SESSION['clues'];
}else{
	$clues = array();
}

foreach($suspects as $suspect){
	$suspect->displayStats();
	print $suspect->isCulprit();
	print "<br><br>";
}

// foreach($locations as $location){
// 	$location->DisplayLocData();
// 	print $location->isCrimeScene();
// 	print "<br><br>";
// }

$detective->displayStats();
print $detective->getTime(). " Hours left <br>";

if(isset($_POST['interview']) && $_POST['interview']=="Interview"){
	
	$clues = array();
	$clues[] = $detective->interview($suspects[$_POST['Suspect']]);
	$_SESSION['clues'] = $clues;
	unset($_POST['interview']);
	header("Location: index.php");
}


var_dump($clues);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>What would you like to do?</h1>
	<ul>
		<li><a href="index.php?page=Investigate">Investigate</a></li>
		<li><a href="index.php?page=Interview">Interview</a></li>
		<li><a href="index.php?page=Unmask">Submit Culprit</a></li>
	</ul>
	<form method = "POST" action="index.php">
		<?php 
		if (isset($_GET['page']) && $_GET['page'] == "Interview"){
		$form->dropdown($suspects, "Suspect");?>
		<input type="submit" name="interview" value="Interview">
		<?php }
		
		if(isset($_GET['page']) && $_GET['page'] == "Investigate"){
			$form->dropdown($locations, "Location");?>
		<?php }
		?>
	</form>
</body>
</html>