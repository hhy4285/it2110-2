<?php
	if(isset($_SESSION['username']) && !is_null($_SESSION['username'])){
	  echo "<li><a href=\"../login/logout.php\"> LOG OUT </a></li>";
	  echo "<li><a href=\"../user_profile_page/user_profile_view.php\"> " . $_SESSION['firstName'] . " </a></li>";
	} else {
	  echo "<li><a href=\"../login/login.php\"> LOGIN </a></li>";
	}
?>