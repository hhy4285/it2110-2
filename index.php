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
        <?php include('resources/menubar.php'); ?>

      </div>
    </ul>
  </header>

  <body>

    <div id="container">

      <div id="search">

        <div id="button_box">
          <form class="form-wrapper-2 cf">
            <input type="text" id="inSearchBox" placeholder="Search..." required>
            <button type="submit">Go</button>
          </form>
        </div>
        <div id="checkboxes">
          <input type="checkbox" id="search_solos" class="checkboxss" name="search_solos" value="Solos">
          <label for="search_solos">Solos</label>

          <input type="checkbox" id="search_groups" class="checkboxss" name="search_groups" value="Groups">
          <label for="search_groups">Groups</label>
        </div>
      </div>

    </div>
    <?php include('resources/footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="resources/homepage.js"></script>
  </body>

</html>