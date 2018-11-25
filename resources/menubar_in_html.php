<?php
    session_start();
    if(isset($_SESSION[''])){ // need a name
      $username = $_SESSION[''];
    }
?>

<?php
	include ('resources/menubar.php');
	if(isset($_SESSION[''])){
	  print_r("<li class="right"><a href='user_profile.html'>" . $username . "</a>");
	  print_r("<li class="right"><a href='resources/logout.php'>Log out</a>");
	}
	else{
	  print_r("<li class="right"><a href="login.html"> LOGIN </a></li>");
	}
	print_r("</ul>")
?>