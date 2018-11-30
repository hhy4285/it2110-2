<?php
// Grab User submitted information
if(isset($_POST['Submit'])){
	$user = $_POST["username"];
	$pass = $_POST["password"];

	$host = 'localhost';
	$dbname = 'websys';
	$dbuser = 'root';
	$dbpass = '';

	// Connect to the database
	$con = mysql_connect($host,$dbuser,$dbpass);
	// Make sure we connected successfully
	if(! $con)
	{
	    die('Connection Failed'.mysql_error());
	}

	// Select the database to use
	mysql_select_db($dbname,$con);

	$result = mysql_query("SELECT username, password FROM users WHERE username = $user");

	$row = mysql_fetch_array($result);

	if($row["username"]==$user && $row["password"]==$pass)
	    echo"You are a validated user.";
	else
	    echo"Sorry, your credentials are not valid, Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../resources/login.css">
    </head>
    <body>
        <div id="login">
          <form method="post" action="login.php">
              <h2>Login</h2>
              <input type="text" id="username" placeholder="Enter Username">
              <input type="text" id="password" placeholder="Enter Password">
              
              <input type="button" id="login-button" name="Submit" value="Sign In">
               <p>Don't have an account? <a href="registration.html">Sign up</a></p>
          </form>
        </div>
    </body>
</html>