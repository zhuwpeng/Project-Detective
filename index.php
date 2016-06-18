<?php
include 'game.php';
session_start();

// $array = array();

// $culprit = new Suspect("Culprit", 5, 5, 2, "Doge", '1950-09-12', True, 1);
// $person = new Detective("dedede", 2, 10, 4, "Male", '1991-03-25');

// $person->displayStats();
// $person->arrest($culprit->IsCulprit());

// $location = new location("Forest", true);

// $info = $location->getLocData();

// $array[] = $person->Interview($culprit);

$game = $_SESSION['game'];
$suspects = $_SESSION['suspects'];
$locations = $_SESSION['locations'];
$detective = $_SESSION['detective'];
$time = $_SESSION['time'];
$answers = $_SESSION['Interview'];
$clues = $_SESSION['Investigate'];


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

if(isset($_GET['page']) && ($_GET['page'] == "Interviewed" || $_GET['page'] == "Investigated")){
	
}

$detective->displayStats();
print $time . " Hours left <br>";

if(isset($_POST['action']) && $_POST['action'] == 1){
	try {
		if ($detective->getTime() > 0 ) {
			$detective->reduceTime(2);
			$_SESSION['time'] = $detective->getTime();
			if(isset($_POST['interview']) && $_POST['interview']=="Interview"){
				//store boolean returned from interview in $answers array
				$answers[$_POST['Suspect']] = $game->action($_POST['interview'], $detective, $_POST['Suspect'], $suspects);
				//save the $answers array in Session
				$_SESSION['Interview'] = $answers;
				unset($_POST['interview']);
				//Redirect to prevent form resubmission
				header("Location: index.php?page=Interviewed");
			}
		
			if(isset($_POST['investigate']) && $_POST['investigate']=="Investigate"){
				$clues[$_POST['Location']] = $game->action($_POST['investigate'], $detective, $_POST['Location'], $locations);
				$_SESSION['Investigate'] = $clues;
				unset($_POST['investigate']);
				header("Location: index.php?page=Investigated");
			}
		}else {
			throw new Exception("You don't have any time left to interview suspects or investigate areas!");
		}
	} catch (Exception $ex) {
		echo $ex->getMessage();
	}
}

if(isset($_POST['unmask']) && $_POST['unmask']=="Unmask"){
	$culprit = $suspects[$_POST['Suspect']];
	$detective->arrest($culprit->isCulprit());
}

foreach($answers as $answer){
	foreach($answer as $details){
		$stats = $details->getStats();
		
		foreach($stats as $points){
			echo $points . "<br>";
		}
	}
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
		<li><a href="index.php?page=Statistics">View Statistics</a>
		<li><a href="index.php?page=Unmask">Submit Culprit</a></li>
	</ul>
	<form method = "POST" action="index.php">
		<?php 
		if (isset($_GET['page']) && $_GET['page'] == "Interview"){
			$game->dropdown($suspects, "Suspect");
			?>
			<input type="hidden" name="action" value="1">
			<?php 
			$game->submitButton("Interview");
		}
		
		if(isset($_GET['page']) && $_GET['page'] == "Investigate"){
			$game->dropdown($locations, "Location");
			?>
			<input type="hidden" name="action" value="1">
			<?php
			$game->submitButton("Investigate");
		}
		
		if(isset($_GET['page']) && $_GET['page'] == "Statistics"){
			
		}
		
		if (isset($_GET['page']) && $_GET['page'] == "Unmask"){
			$game->dropdown($suspects, "Suspect");
			$game->submitButton("Unmask");
		}
		?>
	</form>
</body>
</html>