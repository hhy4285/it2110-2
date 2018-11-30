<?php
  session_start();
	$host = 'localhost';
	$dbname = 'websys';
	$dbuser = 'root';
	$dbpass = 'maple351';

	// Connect to the database
	$con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./resources/login.css">
    </head>
    <body>
        <div id="login">
          <form method="post" action="login.php">
              <h2>Login</h2>
              <fieldset>
              <?php
              if(isset($_POST['Submit'])){              
              // Grab User submitted information
              
              	$user = $_POST["username"];
              	$pass = $_POST["password"];
              
              	$login_stmt = $con->prepare('SELECT username, password FROM users WHERE username = :username AND password = :password');
                $login_stmt->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));
              
              	if($user = $login_stmt->fetch())
                {
              	  //echo"You are a validated user.";
                  $_SESSION['username'] = $user['username'];
                  $_SESSION['uid'] = $user['uid'];
                  header("Location: ../index.php");
                  exit;
                }
              	else
              	  echo"Sorry, your credentials are not valid, Please try again.";
              }
              ?>
              <input type="text" id="username" name="username" placeholder="Enter Username" required>
              <input type="password" id="password" name="password" placeholder="Enter Password" required>
              
              <input type="submit" id="login-button" name="Submit" value="Sign In">
               <p>Don't have an account? <a href="registration.html">Sign up</a></p>
		  </fieldset>
          </form>
        </div>
    </body>
</html>