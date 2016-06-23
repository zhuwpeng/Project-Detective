<?php
include 'game.php';
session_start();

if(!empty($_SESSION['game'])){
	$game = $_SESSION['game'];
	$suspects = $_SESSION['suspects'];
	$locations = $_SESSION['locations'];
	$detective = $_SESSION['detective'];
	$time = $_SESSION['time'];
	// $answers = $_SESSION['Interview'];
	// $clues = $_SESSION['Investigate'];
	$allClues = $_SESSION['allClues'];
	
	foreach($suspects as $suspect){
		$suspect->displayStats();
		//print $suspect->isCulprit();
		print $suspect->getSuspectLoc();
		print "<br><br>";
	}
	
	foreach($locations as $location){
		$location->DisplayLocData();
		//print $location->isCrimeScene();
		//print $location->getRequiredInt();
		print "<br><br>";
		
	}
	
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
					//$answers[$_POST['Suspect']] = $game->action($_POST['interview'], $detective, $_POST['Suspect'], $suspects);
					$allClues[] = $game->action($_POST['interview'], $detective, $_POST['Suspect'], $suspects);
					//save the $answers array in Session
					//$_SESSION['Interview'] = $answers;
					$_SESSION['allClues'] = $allClues;
					unset($_POST['interview']);
					
					//Redirect to prevent form resubmission
					header("Location: index.php?page=Interviewed");
				}
			
				if(isset($_POST['investigate']) && $_POST['investigate']=="Investigate"){
					//$clues[$_POST['Location']] = $game->action($_POST['investigate'], $detective, $_POST['Location'], $locations);
					//$_SESSION['Investigate'] = $clues;
					$allClues[] = $game->action($_POST['investigate'], $detective, $_POST['Location'], $locations);
					$_SESSION['allClues'] = $allClues;
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
	
	// print "<br><br>";
	// var_dump($clues);
	// print "<br><br>";
	// var_dump($answers);
	// print "<br><br>";
	// var_dump($allClues);
} else {
	header("Location: newgame.php");
}
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
			$allpoints = $detective->ShowStats($allClues);
			
			$number = 1;
			
			foreach($allpoints as $points){
				echo "Suspect " . $number++ . " chance " . $points . "<br>";
			}
		}
		
		if (isset($_GET['page']) && $_GET['page'] == "Unmask"){
			$game->dropdown($suspects, "Suspect");
			$game->submitButton("Unmask");
		}
		?>
	</form>
</body>
</html>