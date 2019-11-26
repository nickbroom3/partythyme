<?php

	if(isset($_SESSION['uname'])){
		$uname = $_SESSION['uname'];
	}else{
		header("Location: entry.php");
	}
	if(isset($_POST['addInt_button'])){
		$LEDmessage = strip_tags($_POST['LEDmessage']);
		$LEDcolor = strip_tags($_POST['LEDcolor']);
		$plantTune = strip_tags($_POST['plantTune']);
		$volume = strip_tags($_POST['volumeLevel']);
		$scent = strip_tags($_POST['scentText']);
		$plant = strip_tags($_POST['plantChoice']);


		$query = mysqli_query($con, "INSERT INTO Interactions VALUES ('', '$uname', '$LEDmessage', '$LEDcolor', '$scent', '$plantTune', '$volume', '$plant')");
	}
?>
