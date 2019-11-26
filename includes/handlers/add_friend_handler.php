<?php

if(isset($_POST['addFriend_Button'])){
	//uname


	$friendName = strip_tags($_POST['newFriendText']);
	$friend_query = mysqli_query($con, "SELECT * FROM Users WHERE username='$friendName'");
	$uname = $_SESSION['uname'];

	$friendlistQuery = mysqli_query($con, "SELECT friendList FROM Users where username = '$uname'");
    $row = mysqli_fetch_row($friendlistQuery);
    $friendList = $row[0];
    $friendList = explode (",", $friendList);
	if(mysqli_num_rows($friend_query) == 0) {
		echo "Your friend does not exist";
	}elseif(in_array($friendName, $friendList)){
		echo "You have already added the friend";
	}else{
		$uname = $_SESSION['uname'];
		$user_query = mysqli_query($con, "SELECT * FROM Users WHERE username='$uname' ");
		$user_row = mysqli_fetch_array($user_query);

		$friendList = $user_row['friendList'];
		if($friendList == "") $friendList = $friendName;
		else $friendList = $friendList . "," . $friendName;

		$query = mysqli_query($con, "UPDATE Users SET friendList='$friendList' WHERE username='$uname'");
	}



}

?>
