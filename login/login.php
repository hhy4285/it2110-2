<?php
try{
  session_start();
	$host = 'localhost';
	$dbname = 'websys';
	$dbuser = 'root';
	$dbpass = '';

	// Connect to the database
	$con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Login</title>
      <link rel="stylesheet" href="resources/login.css">
    </head>
    <body>
        <div id="login">
          <form method="post" action="login.php">
              <h2>Login</h2>
              <fieldset>
              <?php
              if(isset($_POST['Login'])){              
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
                  echo"<p style=\"text-align: center;\">Sorry, your credentials are not valid, Please try again.</p>";
              }
              ?>
              <input type="text" id="username" name = "username" placeholder="Enter Username">
              <input type="text" id="password" name = "password" placeholder="Enter Password">
              <input type="submit" class="loginSignupButtons" name="Login" value="Sign In">
              </fieldset>

              <h2>Sign up</h2>
              <fieldset>
              <input type="text" id="username" placeholder="Enter Username">
              <input type="text" id="email" placeholder="Enter Email">
              <input type="text" id="password" placeholder="Enter Password">
              <input type="text" id="password2" placeholder="Re-enter Password">
              <input type="text" id="firstName" placeholder="Enter your first name">
              <input type="text" id="lastName" placeholder="Enter your last name">
              <input type="submit" class="loginSignupButtons" name="SignUp" value="Sign Up">
              </fieldset>
          </form>
        </div>
    </body>
</html>