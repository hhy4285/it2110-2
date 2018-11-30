<?php
    if(isset($_SESSION['username'])){ // need a name
		$username = $_SESSION['username'];
		$firstName = $_SESSION['FirstName'];
		$lastName = $_SESSION['LastName'];
		$email = $_SESSION['Email'];

		// if a user is logged in and is not the founder, a request button will show up.
		echo "<button id='joinRequest' type='submit'>Join Request</button>";


		// The email message
		// reference: http://php.net/manual/en/function.mail.php
		$message = "";
		$message += "Hello,\n";
		$message += "User " . $firstName . $lastName . "wants to join your group! Please review the request.\n"
		$message = "\nHave a nice day!";
		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70);
		// Send the email
		mail($email;, 'Group Founder', $message);
    }
?>