<?php
try{
  session_start();
  $host = 'localhost';
  $dbname = 'websysproject';
  $dbuser = 'root';
  $dbpass = '';

  // Connect to the database
  $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if(isset($_SESSION['username'])){
    $owngroup = $con->prepare("SELECT GroupID FROM groups WHERE FounderID = :user");
    $owngroup->execute([":user" => $_SESSION['UserID']]);
    $dbID = $owngroup->fetch();
  } else {
  }
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>
