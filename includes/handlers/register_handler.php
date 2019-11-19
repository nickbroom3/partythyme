<?php

$uname = ""; 
$password = ""; 


if(isset($_POST['reg_button'])){
	$error_array = array();

	$uname = strip_tags($_POST['reg_uname']); //Remove html tags
	$uname = str_replace(' ', '', $uname); //remove spaces
	$_SESSION['uname'] = $uname; //Stores username into session variable

	//Password
	$password = strip_tags($_POST['reg_password']); //Remove html 
	//Password
	$confirm_password = strip_tags($_POST['reg_password_confirm']); //Remove html 

	if($password != $confirm_password){
		array_push($error_array, "Passwords don't match <br>");
		
	}
	$check_database_query_em = mysqli_query($con, "SELECT * FROM Users WHERE username='$uname' ");
	$check_login_query_em = mysqli_num_rows($check_database_query_em);
	if($check_login_query_em > 0){
		array_push($error_array, "Username already in use<br>");
	}

	if(empty($error_array)){
		$password = md5($password); //Encrypt password before sending to database
		$query = mysqli_query($con, "INSERT INTO Users VALUES ('$uname', '$password', '')");
		header("Location: index.php");
	}
	
}

?>