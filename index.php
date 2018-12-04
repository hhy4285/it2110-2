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
            <input type="text" id="inSearchBox" placeholder="Search..." required>
            <button type="submit" name="search">Go</button>
          </form>
        </div>
        <div id="checkboxes">
          <form method="post" action="index.php">
          <input type="checkbox" id="search_solos" class="checkboxss" name="search_solos" value="Solos">
          <label for="search_solos">Solos</label>

          <input type="checkbox" id="search_groups" class="checkboxss" name="search_groups" value="Groups">
          <label for="search_groups">Groups</label>
          </form>
        </div>
        <?php
          if(isset($_POST))
        ?>
      </div>

    </div>
    <?php include('resources/footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="resources/homepage.js"></script>
  </body>

</html>