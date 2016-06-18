<?php
require_once 'game.php';
session_start();

if(isset($_POST['confirm']) && $_POST['confirm']=="Confirm"){
	$game = new Game();
	
	$_SESSION['detective'] = new Detective($_POST['name'], 10, 10, 10, $_POST['gender'], $_POST['age']);
	$_SESSION['time'] = $_SESSION['detective']->getTime();
	$_SESSION['suspects'] = $game->getSuspects();
	$_SESSION['locations'] = $game->getLocations();
	$_SESSION['game'] = $game;
	$_SESSION['Interview'] = array();
	$_SESSION['Investigate'] = array();
	header('Location: index.php');
}

?>

<!DOCtype html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
	if(isset($_POST['start']) && $_POST['start']=="New Game"){
		session_unset();
	?>
		<H1>Fill in your character info!</H1>
		<form method="POST" action="newgame.php">
			<input type="text" name="name" placeholder="Name">
			<input type="text" name="age" placeholder="Age">
			<label>Male</label><input type="radio" name="gender" value="Male">
			<label>Female</label><input type="radio" name="gender" value="Female">
			<input type="submit" name="confirm" value="Confirm">
		</form>
	<?php 
	}else{
	?>
		<H1>Detective game</H1>
		<form method="POST" action="newgame.php">
			<input type="submit" name="start" value="New Game">
		</form>
	<?php 
	}
	?>
</body>
</html>