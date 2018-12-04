<?php
try{
  session_start();
	$host = 'localhost';
	$dbname = 'websysproject';
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
              <?php
              if(isset($_POST['Login'])){              
              // Grab User submitted information
              
                $user = $_POST["username"];
                $pass = $_POST["password"];
              
                $login_stmt = $con->prepare('SELECT username, password, firstName, UserID FROM users WHERE username = :username AND password = :password');
                $login_stmt->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));
              
                if($user = $login_stmt->fetch())
                {
                  //echo"You are a validated user.";
                  $_SESSION['username'] = $user['username'];
                  $_SESSION['firstName'] = $user['firstName'];
                  $_SESSION['UserID'] = $user['UserID'];
                  header("Location: ../index.php");
                  exit;
                }
                else
                  echo"<p style=\"text-align: center;\">Sorry, your credentials are not valid, Please try again.</p>";
              }
              ?>
              <input type="text" id="username" name = "username" placeholder="Enter Username">
              <input type="password" id="password" name = "password" placeholder="Enter Password">
              <input type="submit" class="loginSignupButtons" name="Login" value="Sign In">

              <h2>Sign up</h2>
              <?php
              if(isset($_POST['SignUp'])){              
              // Grab User submitted information
              
                $user = $_POST["Nuser"];
                $pass1 = $_POST["Npass1"];
                $pass2 = $_POST["Npass2"];
                $email = $_POST["Nemail"];
                $fname = $_POST["Nfirstname"];
                $lname = $_POST["Nlastname"];
                
                $sign_stmt = $con->prepare('SELECT username FROM users WHERE username = :username');
                $sign_stmt->execute(array(':username' => $_POST['Nuser']));
                if($user == $sign_stmt->fetch())
                {
                  echo "<p style=\"text-align: center;\">Sorry, the username is already taken, Please try again.</p>";
                  //echo"<script>alert('The username is already taken')</script>";
                } else if ($pass1 != $pass2) {
                  echo "<p style=\"text-align: center;\">Sorry, the passwords do not match, Please try again.</p>";
                  //echo("<script>alert('The passwords do not match')</script>");
                } else {
                  $sign_stmt = $con->prepare("INSERT INTO `users` (username, `password`, email, FirstName, LastName) VALUES (:user, :pass, :email, :firstname, :lastname)");
                  $sign_stmt->execute(array(':user' => $user, ':pass' => $pass1, ':email' => $email, ':firstname' => $fname, ':lastname' => $lname));
                  $_SESSION['username'] = $user;
                  $_SESSION['firstName'] = $fname;
                  header("Location: ../index.php");
                  exit;
                }
              }
              ?>
              <input type="text" id="username" name="Nuser" placeholder="Enter Username">
              <input type="text" id="email" name="Nemail" placeholder="Enter Email">
              <input type="password" id="password" name="Npass1" placeholder="Enter Password">
              <input type="password" id="password2" name="Npass2" placeholder="Re-enter Password">
              <input type="text" id="firstName" name="Nfirstname" placeholder="Enter your first name">
              <input type="text" id="lastName" name="Nlastname" placeholder="Enter your last name">
              <input type="submit" class="loginSignupButtons" name="SignUp" value="Sign Up">
              
          </form>
        </div>
    </body>
</html>