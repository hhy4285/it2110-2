<?php
include("resources/header.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Group 7</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="resources/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  </head>

  <header>
    <ul id="homebar">
      <li><a href="index.php"> HOME </a></li>
      <div class="right">
        <?php
          if(isset($_SESSION['username']) && !is_null($_SESSION['username'])){
            echo "<li><a href=\"login/logout.php\"> LOG OUT </a></li>";
            echo "<li><a href=\"user_profile_page/user_profile_view.php\"> " . $_SESSION['firstName'] . " </a></li>";
          } else {
            echo "<li><a href=\"login/login.php\"> LOGIN </a></li>";
          }
        ?>
      </div>
    </ul>
  </header>

  <body>

    <div id="container">

      <div id="search">
        <div id="button_box">
          <form class="form-wrapper-2 cf" method="post" action="index.php">
            <input type="text" id="inSearchBox" name="searchtext" placeholder="Search..." required>
            <button type="submit" name="search">Go</button>
          </form>
        </div>
        <div id="checkboxes">
          <form method="post" action="index.php">
          <input type="radio" id="search_solos" class="checkboxss" name="search_type" value="Solos">
          <label for="search_solos">Solos</label>

          <input type="radio" id="search_groups" class="checkboxss" name="search_type" value="Groups">
          <label for="search_groups">Groups</label>

          <input type="checkbox" id="search_groups" name="search_tags" value="Tags">
          <label for="search_tags">Tags</label>
          </form>
        </div>
      </div>
      <div id="results">
        <?php
          if(isset($_POST["search"])){
            $term = $_POST["searchtext"];
            if(isset($_POST["search_type"])) {
              if($_POST["search_type"] == "Solos"){
                if(isset($_POST["search_tags"])){
                  $stmt = $con->prepare();
                } else {
                  $stmt = $con->prepare();
                }
              } else if ($_POST["search_type"] == "Groups") {
                if(isset($_POST["search_tags"])){
                  $stmt = $con->prepare();
                } else {
                  $stmt = $con->prepare();
                }
              }
            }
          }
        ?>
      </div>
    </div>
    <?php
	echo '<div id ="footer-container">

      		<footer>

	      		<table id="footer-organization">
						  <tr>	
						  	<th>
						  		<a id="git-icon" href="https://github.com/hhy4285/it2110-2.git" target="blank">
	          			<img src="resources/github-icon.png" alt="Github" />
	      					</a>
	      				</th>			
	      				<th><a href="index.php">Home</a></th>
	      				<th><a href="user_profile_page/user_profile_view.php">My Profile</a></th>
	      				<th><a href="group_profile_page/group_profile.php">My Group</a></th>
						  </tr>
						</table>
	      			<p>© Copyright 2018, RPI | Group 7</p>
      		</footer>
    	</div>';
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--<script src="resources/homepage.js"></script>-->
  </body>

</html>