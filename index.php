<?php

include('character.php');


$person = new character("dedede", 2, 3, 4, "Male", '1991-03-25');

$person->display();


?>

<DOCTYPE html>
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