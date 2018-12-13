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
    // connect to database
      $dbname = 'websysproject';
      $user = 'root';
      $pass = '';
      $conn = mysqli_connect("localhost", $user, $pass, $dbname);

      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

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
      }

      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }


      if(isset($_POST['submitbtn']) && $_POST['submitbtn'] == 'Submit'){
        $name = $_POST["newName"];
        $description = $_POST["newDescription"];
        $members = $_POST["addedMembers"];
        $progress = $_POST["newProgress"];
        $recruit = $_POST["newRecruit"];
        
        $sql = "UPDATE groups SET GroupName='$name', Description='$description', member='$members', progress='$progress', recruitInfo='$recruit' WHERE GroupID='$groupID' LIMIT 1";

        mysqli_query($conn, $sql);

        header("Location: group_profile2.php");
        exit;
        }
      
    ?>
    <div id="cotainer">
    <div id="profile_block">
      <h1 id="groupName"><?php echo $groupName; ?></h1>
      <form id="user-data-form" method="post" action="group_profile_edit1.php">

        <input class="input-field" type="text" id="groupName2" name="newName" placeholder="New group name..." rows="1" maxlength="25"></input>

        <input class="input-field" type="text" id="description" name="newDescription" placeholder="Add new description..." rows="1" maxlength="150"></input><br>




        <input class="input-field" type="text" id="groupMembers" name="addedMembers" placeholder="Add members separated by spaces..." rows="1" maxlength="25"></input>
        <!--<label for="user-data-form" type="button" class="addButton" id="addMembers" value="Save" name="save" onclick="">ADD</label><br>-->




        <input class="input-field" type="text" id="progress" name="newProgress" placeholder="Add project progresses  separated by spaces..." rows="1" maxlength="50"></input>
        <!--<label for="user-data-form" type="button" class="addButton" id="addProgress" value="Save" name="save" onclick="">ADD</label><br>-->




        <input class="input-field" type="text" id="recruitInfo" name="newRecruit" placeholder="Add recruit info separated by spaces..." rows="1" maxlength="25"></input>

        <!--<label for="user-data-form" type="button" class="addButton" id="saveRecruit" value="Save" name="save" onclick="">ADD</label><br>-->

        <input type="submit" class="addButton" id="submitBtn" name="submitbtn" value="Submit">

      </form>

    </div>
    </div>
    <?php include('../resources/footer.php'); ?>
  </body>
</html>