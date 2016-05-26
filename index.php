<?php

include('character.php');

if (isset($_POST['submit'])) {
	

$detective = new Character($_POST['name']);

echo $detective->getName();

}

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