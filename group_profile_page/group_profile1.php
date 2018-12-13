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
      <li><a href="../index.php"> HOME </a></li>
      <div class="right">
        <?php include('../resources/menubar.php'); ?>
      </div>
    </ul>
  </header>

  <body>
    <?php
      try {
        $groupID = $_GET['target'];
        $sql = $con -> prepare("SELECT * FROM groups WHERE GroupID='".$groupID."' LIMIT 1");
        $sql -> execute();
        while ($row = $sql -> fetch(PDO::FETCH_ASSOC)){
          $groupName = $row["groupName"];
          $description = $row["description"];
          $member1 = $row["member1"];
          $member2 = $row["member2"];
          $member3 = $row["member3"];
          $member4 = $row["member4"];
          $progress1 = $row["progress1"];
          $progress2 = $row["progress2"];
          $progress3 = $row["progress3"];
          $recruitInfo1 = $row["recruitInfo1"];
          $recruitInfo2 = $row["recruitInfo2"];
          $recruitInfo3 = $row["recruitInfo3"];
          $groupEmail = $row["email"];
          //echo $row[""];
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
                    <li><a href='#'> " . $member1 . " </a></li>
                    <li><a href='#'> " . $member2 . " </a></li>
                    <li><a href='#'> " . $member3 . " </a></li>
                    <li><a href='#'> " . $member4 . " </a></li>
                  </ul>
                </div>
                <div class='border'></div>

                <div class='blocks' id='projectProgress'>
                  <h2 class='title2'>Project Progress:</h2>
                  <ul>
                    <li>" . $progress1 . "</li>
                    <li>" . $progress2 . "</li>
                    <li>" . $progress3 . "</li>
                  </ul>
                </div>
                <div class='border'></div>

                <div class='blocks' id='recruitInfo'>
                  <h2 class='title2'>We are looking for:</h2>
                  <ul>
                    <li>" . $recruitInfo1 . "</li>
                    <li>" . $recruitInfo2 . "</li>
                    <li>" . $recruitInfo3 . "</li>
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
