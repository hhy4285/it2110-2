<?php
include("../resources/header.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Group Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="../resources/style.css"/>
    <link type="text/css" rel="stylesheet" href="resources/style_group_profile.css"/>
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Suez+One" rel="stylesheet">
  </head>

  <header>
    <ul id="homebar">
      <li><a href="../index.php">HOME</a></li>
      <div class="right">
        <?php include('../resources/menubar.php'); ?>
      </div>
    </ul>
  </header>

  <body>
    <?php
      try {
        // connect to database           
        $dbname = 'websysproject';
        $user = 'root';
        $pass = '';             
        $conn = mysqli_connect("localhost", $user, $pass, $dbname);

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        //$UserName = $_GET['target'];
        $UserName = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='".$UserName."' LIMIT 1";
        $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)){
          $uID = $row["UserID"];
        }

        $sql = "SELECT * FROM group_individual_relations WHERE userID='".$uID."' LIMIT 1";
        $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)){
          $groupID = $row["groupID"];
        }

        $sql = "SELECT * FROM groups WHERE GroupID='".$groupID."' LIMIT 1";
        $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)){
          $groupName = $row["GroupName"];
          $description = $row["Description"];
          $member = $row["member"];
          $progress = $row["progress"];
          $recruitInfo = $row["recruitInfo"];
          //$member1 = $row["member1"];
          //$member2 = $row["member2"];
          //$member3 = $row["member3"];
          //$member4 = $row["member4"];
          //$progress1 = $row["progress1"];
          //$progress2 = $row["progress2"];
          //$progress3 = $row["progress3"];
          //$recruitInfo1 = $row["recruitInfo1"];
          //$recruitInfo2 = $row["recruitInfo2"];
          //$recruitInfo3 = $row["recruitInfo3"];
          $groupEmail = $row["ContactEmail"];
        }
      }catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    ?> <!-- -->
    <div id="container">
    <div id="profile_block">
      <?php 
        echo "<h1 id='groupName'>" . $groupName . "</h1>
                <form action='group_profile1.php' method='post'>
                  <input type='submit' value='JoinRequest'/>
                  <input type='hidden' name='button_pressed' value='1'/>
                </form>
                <button id='editBtn'><a href='group_profile_edit.php'>Edit</a></button>
                <div class='blocks' id='abstract'>
                  <h2 class='title2'>Description:</h2><br>
                  " . $description . "
                </div>
                <div class='border'></div>
                

                <div class='blocks' id='group_members'>
                  <h2 class='title2'>Group Members:</h2>
                  <ul>
                    <li><a href='#'> " . $member . " </a></li>
                    <li><a href='#'> " . $member . " </a></li>
                    <li><a href='#'> " . $member . " </a></li>
                    <li><a href='#'> " . $member . " </a></li>
                  </ul>
                </div>
                <div class='border'></div>

                <div class='blocks' id='projectProgress'>
                  <h2 class='title2'>Project Progress:</h2>
                  <ul>
                    <li>" . $progress . "</li>
                    <li>" . $progress . "</li>
                    <li>" . $progress . "</li>
                  </ul>
                </div>
                <div class='border'></div>

                <div class='blocks' id='recruitInfo'>
                  <h2 class='title2'>We are looking for:</h2>
                  <ul>
                    <li>" . $recruitInfo . "</li>
                    <li>" . $recruitInfo . "</li>
                    <li>" . $recruitInfo . "</li>
                  </ul>
                </div>";



        if(isset($_POST['button_pressed'])) {
            $subject = 'the subject';
            $message = 'Hello';
            $content = 'wants to join your team. Please review the request' . phpversion();

            mail($groupEmail, $subject, $message, $content);
            echo 'Email Sent.';
        }
      ?>
      

    </div>
    </div>
    <?php include('../resources/footer.php'); ?>
  </body>
</html>
