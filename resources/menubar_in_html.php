<?php
    session_start();
    if(isset($_SESSION['username'])){ // need a name
      $username = $_SESSION['username'];
    }
?>

<?php
	include ('resources/menubar.php');
	if(isset($_SESSION[''])){
	  print_r("<li><a href='../login/logout.php'>Log out</a></li>");
	  print_r("<li><a href='user_profile.html'>" . $username . "</a></li>");
	}
	else{
	  print_r("<li><a href='../login/login.html'> LOGIN </a></li>");
	}
	print_r("<div/>
		</ul>")
?>