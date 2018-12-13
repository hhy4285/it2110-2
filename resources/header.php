<?php
try{
  session_start();
  $host = 'localhost';
  $dbname = 'websysproject';
  $dbuser = 'root';
  $dbpass = '';
  $dbid = null;

  // Connect to the database
  $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if(isset($_SESSION['username'])){
    $owngroup = $con->prepare("SELECT groupID FROM group_individual_relations WHERE userID = :user");
    $owngroup->execute([":user" => $_SESSION['UserID']]);
    $dbid = $owngroup->fetch()['groupID'];
  } else {}
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>
