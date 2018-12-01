<?php
try{
  session_start();
  $host = 'localhost';
  $dbname = 'websys';
  $dbuser = 'root';
  $dbpass = 'maple351';

  // Connect to the database
  $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if(isset($_SESSION['username'])){
  } else {
  }
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
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

      <div class="button_box">
        <form class="form-wrapper-2 cf">
          <input type="text" placeholder="Search Groups..." required>
          <button type="submit">Search</button>
        </form>
      </div>

      <div class="button_box">
        <form class="form-wrapper-2 cf">
          <input type="text" placeholder="Search Solos..." required>
          <button type="submit">Search</button>
        </form>
      </div>
    </div>
    <?php include('resources/footer.php'); ?>

  </body>
</html>