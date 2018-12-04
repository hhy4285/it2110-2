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
  </head>

  <header>
<ul id="homebar">
      <li><a href="index.php"> HOME </a></li>
      <div class="right">
        <?php
          if(isset($_SESSION['username']) && !is_null($_SESSION['username'])){
            echo "<li><a href=\"login/logout.php\"> LOG OUT </a></li>";
            echo "<li><a href=\"user_profile_page/user_profile_view.php?target=" . $_SESSION['username'] . "\"> " . $_SESSION['firstName'] . " </a></li>";
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
          <form class="form-wrapper-2 cf" method="get" action="index.php">
            <input type="text" id="inSearchBox" name="searchtext" placeholder="Search..." required>
            <button type="submit" name="search">Go</button>
          
        </div>
        <div id="checkboxes">
          <!--<form method="get" action="index.php">-->
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
          if(isset($_GET["search"])){
            $term = $_GET["searchtext"];
            echo "<table style=\"text-align: center; width:30%; margin-left: auto; margin-right: auto; margin-top: 2%;\">";
            if(isset($_GET["search_type"])) {
              if($_GET["search_type"] == "Solos"){
                echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Profile</th></tr>";
                if(isset($_GET["search_tags"])){
                  $stmt = $con->prepare("SELECT username, FirstName, LastName, Email FROM users WHERE Skill1 LIKE '%{$term}%' OR Skill2 LIKE '%{$term}%' OR Skill3 LIKE '%{$term}%' OR Skill4 LIKE '%{$term}%' GROUP BY username");
                  $stmt->execute();
                  while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['FirstName'] . "</td>";
                    echo "<td>" . $row['LastName'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td><a href=\"user_profile_page/user_profile_view.php?target=" . $row['username'] . "\">Link</a></td>";
                    echo "</tr>";
                  }
                } else {
                  $stmt = $con->prepare("SELECT username, FirstName, LastName, Email FROM users WHERE username LIKE '%{$term}%' OR FirstName LIKE '%{$term}%' OR LastName LIKE '%{$term}%' OR Email LIKE '%{$term}%' GROUP BY username");
                  $stmt->execute();
                  while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['FirstName'] . "</td>";
                    echo "<td>" . $row['LastName'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td><a href=\"user_profile_page/user_profile_view.php?target=" . $row['username'] . "\">Link</a></td>";
                    echo "</tr>";
                  }
                }
              } else if ($_GET["search_type"] == "Groups") {
                echo "<tr><th>Group Name</th><th>Group Email</th><th>Profile</th></tr>";
                if(isset($_GET["search_tags"])){
                  $stmt = $con->prepare("SELECT GroupName, ContactEmail FROM groups WHERE Skill1 LIKE '%{$term}%' OR Skill2 LIKE '%{$term}%' OR Skill3 LIKE '%{$term}%' OR Skill4 LIKE '%{$term}%' GROUP BY GroupName");
                  $stmt->execute();
                  while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['GroupName'] . "</td>";
                    echo "<td>" . $row['ContactEmail'] . "</td>";
                    echo "<td><a href=\"group_profile_page/group_profile.php?target=" . $row['GroupName'] . "\">Link</a></td>";
                    echo "</tr>";
                  }
                } else {
                  $stmt = $con->prepare("SELECT GroupName, ContactEmail FROM groups WHERE GroupName LIKE '%{$term}%' OR ContactEmail LIKE '%{$term}%' OR `Description` LIKE '%{$term}%' GROUP BY GroupName");
                  $stmt->execute();
                  while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['GroupName'] . "</td>";
                    echo "<td>" . $row['ContactEmail'] . "</td>";
                    echo "<td><a href=\"group_profile_page/group_profile.php?target=" . $row['GroupName'] . "\">Link</a></td>";
                    echo "</tr>";
                  }
                }
              }
            }
            echo "</table>";
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
						  <th><a href="index.php">Home</a></th>';
						  if(isset($_SESSION['username'])){
							echo'<th><a href="user_profile_page/user_profile_view.php?target=' . $_SESSION['username'] .'">My Profile</a></th>
	      					<th><a href="group_profile_page/group_profile.php?target=' . $_SESSION['UserID'] . '">My Group</a></th>';
						  } else {
                echo'<th><a href="login/login.php">My Profile</a></th>
	      					<th><a href="login/login.php">My Group</a></th>';
              }
						  echo'</tr>
						</table>
	      			<p>© Copyright 2018, RPI | Group 7</p>
      		</footer>
    	</div>';
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="resources/homepage.js"></script> -->
</html>