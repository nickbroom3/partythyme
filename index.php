<?php  
require 'config/config.php';
require 'includes/handlers/index_handler.php';
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
      <a href="#">Home</a>
      <a href="#">Product</a>
      <a href="#">Team</a>
      <a href="#">Contact</a>
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

      <div class="main-container">
        <div class="main-left">
          <div class="sub-title">
            <span class="underline">
              My Plant
            </span>
          </div>
          <div class="plant-pic">
            <img src="images/plant.png" alt="">
          </div>
          <div class="plant-info center">
            <table class="plant-stats">
              <tr>
                <td>
                  <b id="health">Party Thyme's Health:</b>
                </td>
                <td>
                  <input disabled type="range" min="1" max="100" value="80" class="slider stats health">
                </td>
              </tr>
              <tr>
                <td>
                  <b id="water">Party Thyme's Water Level:</b>
                </td>
                <td>
                  <input disabled type="range" min="1" max="100" value="65" class="slider stats water">
                </td>
              </tr>
              <tr>
                <td>
                  <b id="ph">Party Thyme's Ph:</b>
                </td>
                <td>
                  <input disabled type="range" min="1" max="140" value="65" class="slider stats ph">
                </td>
              </tr>
            </table>
          </div>
          <div class="left-root"> </div>
        </div>
        <div class="main-right">
          <div class="sub-title">
            <span class="underline">
              Create new Encouragemint
            </span>
          </div>

        <form action="index.php#addInteractionForm" method="POST" id="addInteractionForm">
          <table class="settings-table">
          	 <tr>
              <td>
                <span class="settings-title">
                  LED Message:
                </span>
              </td>
              <td>
                <span class="message-input">
                  <input type="text" name="LEDmessage" placeholder="Message..." onchange="updateMessage(this.value)">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="settings-title">
                  LED Color:
                </span>
              </td>
              <td>
                <span class="color-input">
                  <input type="color" name="LEDcolor" value="#1adf1d" onchange="updateColor(this.value)"
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="settings-title">
                  Tune:
                </span>
              </td>
              <td>
                <span class="message-input">
                  <input type="text" name="plantTune" placeholder="morningsunshine.mp4" onchange="updateName(this.value)">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="settings-title">
                  Speaker Volume:
                </span>
              </td>
              <td>
                <span class="slider-input">
                  <input type="range" min="0" max="20" value="10" class="slider" id="volume" name="volumeLevel" onchange="updateVolume(this.value)">
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="settings-title">
                  Scent Select:
                </span>
              </td>
              <td>
                <div class="scent-input">
                  <a href="javascript:void(0)" class="active" onclick="updateScent(1)" id="scent1" name="scent1" >Apple</a> 
                  <a href="javascript:void(0)" onclick="updateScent(2)" id="scent2" name="scent" >Cherry</a>
                  <a href="javascript:void(0)" onclick="updateScent(3)" id="scent3" name="scent" >Sweat</a> <br> <br>
                  <input type="text" name="scentText" id="scentText"  >

                
              </td>
            </tr>
          </table>

           Select friend's plant
          <div class="custom-select" style="width:350px;" onmouseout="setFriendText()">

        <select name="owner" onchange="setFriendText()" id="selectFriend">
          <?php 

            $sql = mysqli_query($con, "SELECT username FROM Users");

            $uname = $_SESSION['uname'];
            $friendlistQuery = mysqli_query($con, "SELECT friendList FROM Users where username = '$uname'");
            $row = mysqli_fetch_row($friendlistQuery);
            $friendList = $row[0];
            $friendList = explode (",", $friendList);  

            foreach($friendList as $friend){
              echo "<option value=\"owner1\">" . $friend . "</option>";
            } 

            /*while ($row = $sql->fetch_assoc()){
              if($_SESSION['uname'] != $row['username']) echo "<option value=\"owner1\">" . $row['username'] . "</option>";
            } */

          ?>
        </select>
      </div>
      <input type="text" name="newFriendText" id="newFriendText">
          <input type="submit" name="addInt_button" placeholder="Confirm"  required>
         </form>

 	  
          <br><br><br><br>
          <div class="output">
            <div id="color-value">
              #1adf1d
            </div>
            <div id="message-value">
              Message...
            </div>
            <div id="volume-value">
              10
            </div>
            <div id="scent-value">
              Scent 1
            </div>
          </div>
          <div class="right-root"> </div>
        </div>
      </div>
    </div>

  </body>


  <script src="js/fancy_select.js"></script>
  <script>

    $( document ).ready(function() {
      document.getElementById('scentText').style.display = 'none';
    });

    function updateName(str) {
      document.getElementById("health").innerHTML = str +"'s Health:";
      document.getElementById("water").innerHTML = str +"'s Water:";
      document.getElementById("ph").innerHTML = str +"'s pH";

    }

    function updateColor(newColor) {
      document.getElementById("color-value").innerHTML = newColor;
      color = newColor;
    }
    function updateMessage(msg) {
      document.getElementById("message-value").innerHTML = msg;
    }
    function updateVolume(num) {
      document.getElementById("volume-value").innerHTML = num;
    }
    function updateScent(num) {
      document.getElementById("scent1").classList.remove("active");
      document.getElementById("scent2").classList.remove("active");
      document.getElementById("scent3").classList.remove("active");
      switch(num) {
        case 1:
          document.getElementById("scent1").classList.add("active");
          document.getElementById("scent-value").innerHTML = "Scent 1";
          break;
        case 2:
          document.getElementById("scent2").classList.add("active");
          document.getElementById("scent-value").innerHTML = "Scent 2";
          break;
        case 3:
          document.getElementById("scent3").classList.add("active");
          document.getElementById("scent-value").innerHTML = "Scent 3";
          break;
        default:
          // code block
      }
      console.log(document.getElementById("scent" + num).innerHTML);
      document.getElementById("scentText").value = document.getElementById("scent" + num).innerHTML;
    }

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

    function addInteraction(){
    	window.location.href="confirm.php?color=" + color;
    }

  </script>
</html>



PartyThyme