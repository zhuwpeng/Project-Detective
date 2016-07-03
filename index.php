<?php
include 'game.php';
session_start();

$questionString = array();

$questionString[1] = "Where were you when the crime happened?";
$questionString[2] = "Who do you think is the culprit?";
$questionString[3] = "Can you describe the culprit?";

if(!empty($_SESSION['game'])){
	$game = $_SESSION['game'];
	$suspects = $_SESSION['suspects'];
	$locations = $_SESSION['locations'];
	$detective = $_SESSION['detective'];
	$questions = $_SESSION['questions'];
	$time = $_SESSION['time'];
	$allClues = $_SESSION['allClues'];
	$message = "";
	
	if(isset($_GET['page']) && ($_GET['page'] == "Interviewed" || $_GET['page'] == "Investigated")){
		
	}
	
	$detective->displayStats();
	print $time . " Hours left <br>";
	
	if(isset($_POST['action']) && $_POST['action'] == 1){
		if ($game->getTime() > 0 ) {
			$game->reduceTime(2);
			$_SESSION['time'] = $game->getTime();
			if(isset($_POST['interview']) && $_POST['interview']=="Interview"){
				
				$answers = $game->action($_POST['interview'], $detective, $_POST['Suspect'], $suspects, $_POST['Question']);
				
// 				//store boolean returned from interview in $answers array
// 				$allClues[] = $game->action($_POST['interview'], $detective, $_POST['Suspect'], $suspects);
// 				//save the $answers array in Session
// 				$_SESSION['allClues'] = $allClues;
				unset($_POST['interview']);
				
				//Redirect to prevent form resubmission
				header("Location: index.php?page=Interviewed");
			}
		
			if(isset($_POST['investigate']) && $_POST['investigate']=="Investigate"){
				$allClues[] = $game->action($_POST['investigate'], $detective, $_POST['Location'], $locations);
				$_SESSION['allClues'] = $allClues;
				unset($_POST['investigate']);
				header("Location: index.php?page=Investigated");
			}
		}else {
			$message = "You don't have any time left to interview suspects or investigate areas!";
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
	<?php echo $message; ?>
	<ul>
		<li><a href="index.php?page=Suspects">Suspects</a></li>
		<li><a href="index.php?page=Locations">Locations</a></li>
		<li><a href="index.php?page=Investigate">Investigate</a></li>
		<li><a href="index.php?page=Interview">Interview</a></li>
		<li><a href="index.php?page=Statistics">View Statistics</a>
		<li><a href="index.php?page=Unmask">Submit Culprit</a></li>
	</ul>
	<form method = "POST" action="index.php">
		<?php 
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "Suspects") {
				foreach($suspects as $suspect){
					$suspect->displayStats();
					print $suspect->isCulprit();
					print "Last seen: Location " . $suspect->getSuspectLoc();
					print "<br>";
					
					$clothing = $game->getColors($suspect->getClothing());
					
					echo "Shirt color: " . $clothing[0] ."<br>
						Pants color: " . $clothing[1] . "<br>
						Shoe color: ". $clothing[2] . "<br><br>";
				}
			}
			
			if($_GET['page'] == "Locations") {
				foreach($locations as $location){
					$location->DisplayLocData();
					//print $location->isCrimeScene();
					//print $location->getRequiredInt();
					print "<br><br>";
				}
			}
			
			if ($_GET['page'] == "Interview"){
				$game->dropdown($suspects, "Suspect");
				$game->dropdown($questionString, "Question");
				?>
				<input type="hidden" name="action" value="1">
				<?php 
				$game->submitButton("Interview");
			}
			
			if($_GET['page'] == "Investigate"){
				$game->dropdown($locations, "Location");
				?>
				<input type="hidden" name="action" value="1">
				<?php
				$game->submitButton("Investigate");
			}
			
			if($_GET['page'] == "Statistics"){
				$allpoints = $detective->ShowStats($allClues);
				
				$number = 1;
				
				foreach($allpoints as $points){
					echo "Suspect " . $number++ . " chance " . $points . "<br>";
				}
			}
			
			if ($_GET['page'] == "Unmask"){
				$game->dropdown($suspects, "Suspect");
				$game->submitButton("Unmask");
			}
		}
		?>
	</form>
</body>
</html>