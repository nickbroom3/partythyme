<?php 

	if(isset($_POST['addInt_button'])){
		$LEDmessage = strip_tags($_POST['LEDmessage']);
		$LEDcolor = strip_tags($_POST['LEDcolor']);
		$plantTune = strip_tags($_POST['plantTune']);
		$volume = strip_tags($_POST['volumeLevel']);
		$scent = strip_tags($_POST['scentText']);
		echo $volume;

		$query = mysqli_query($con, "INSERT INTO Interactions VALUES ('', 'nick', '$LEDmessage', '$LEDcolor', '$scent', '$plantTune', '$volume', 'felix')");
	}
?> 