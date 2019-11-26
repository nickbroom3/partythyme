<?php
	require 'config/config.php';
	require 'includes/handlers/add_friend_handler.php';

    if (!isset($_SESSION['uname'])) {
        header("Location:entry.php");
    }


?>

<head>
  <link rel="stylesheet" type="text/css" href="style/main.css">
  <link rel="stylesheet" type="text/css" href="style/slider.css">
  <link rel="stylesheet" type="text/css" href="style/settings.css">
  <link rel="stylesheet" type="text/css" href="style/sidenav.css">
  <link rel="stylesheet" type="text/css" href="style/addFriends.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">

  <title>Party Thyme</title>
  <link rel="icon" type="image/gif/png" href="images/logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



</head>
<html>
  <body>

		<div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="./">Home</a>
      <a href="./addfriends.php">Add Friends</a>
      <a href="./about.php">About</a>
      <a href="./entry.php">Log Out</a>
    </div>

    <div id="not-navbar">

      <div class="menu-icon" onclick="openNav()">
        <div></div>
        <div></div>
        <div></div>
      </div>

      <div class="title">
        <img src="images/logo.png" alt="">
        <h1>Party Thyme</h1>
      </div>

      <div class="main-container add-friends">

        <div class="page-title">
          Find Friends
        </div>
        <hr>
        <form action="addFriends.php#addFriendForm" method="POST" id="addFriendForm">
        	<div class="custom-select" style="width:350px;" onmouseout="setFriendText()">

				<select name="owner" onchange="setFriendText()" id="selectFriend">
					<option>Friend List</option>
          <?php

            $sql = mysqli_query($con, "SELECT username FROM Users");
            while ($row = $sql->fetch_assoc()){
              if($_SESSION['uname'] != $row['username']) echo "<option value=\"owner1\">" . $row['username'] . "</option>";
            }
          ?>
        </select>
        </div>
      <input type="text" name="newFriendText" id="newFriendText">
			<input type="text"  id="plantChoice" style="display:none;">
			<input  class="submit-button" type="submit" name="addFriend_Button" placeholder="Add Friend"  required>

		</form>


    </div>

  </body>


  <script src="js/fancy_select.js"></script>
  <script>



    /* Set the width of the side navigation to 250px */
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("not-navbar").style.filter = "blur(4px)";

    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("not-navbar").style.filter = "none";
    }


  </script>
</html>
