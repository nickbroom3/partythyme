<?php
$uname = ""; 
$password = ""; 


if(isset($_POST['log_button'])){
	
	$error_array = array();
	$uname = strip_tags($_POST['log_uname']); //Remove html tags
	$uname = str_replace(' ', '', $uname); 
	$_SESSION['uname'] = $uname; //Stores username into session variable

	$password = md5(strip_tags($_POST['log_password'])); //Remove html 

	$check_database_query_em = mysqli_query($con, "SELECT * FROM Users WHERE username='$uname' ");
	$check_login_query_em = mysqli_num_rows($check_database_query_em);
	if($check_login_query_em == 0){
		array_push($error_array, "Username not found <br>");
	}else{
		$check_database_query_em = mysqli_query($con, "SELECT * FROM Users WHERE username='$uname' and password='$password' ");
		$check_login_query_em = mysqli_num_rows($check_database_query_em);
		if($check_login_query_em == 0){
			array_push($error_array, "Password incorrect <br>");
		}
	}
	

	if(empty($error_array)){
		header("Location: index.php");
	}
	
}

?>