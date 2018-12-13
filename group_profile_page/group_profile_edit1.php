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
    <div id="cotainer">
    <div id="profile_block">
      <h1 id="groupName">TaskFuse</h1>
      <form id="user-data-form" method="post" action="group_profile_edit1.php">
        <?php
          if(isset($_POST['submitbtn'])){
            $name = $_POST["newName"];
            $description = $_POST["newDescription"];
            $members = $_POST["addedMembers"];
            $progress = $_POST["newProgress"];
            $recruit = $_POST["newRecruit"];
            
            $sign_stmt = $con->prepare('SELECT GroupID FROM groups WHERE GroupID = :GroupID');
            $sign_stmt->execute(array(':GroupID' => $_POST['Nuser']));
            if($name == $sign_stmt->fetch())
            {
              echo "<p style=\"text-align: center;\">Sorry, the group name is already taken, Please try again.</p>";
              //echo"<script>alert('The username is already taken')</script>";
            } else {
            $sign_stmt = $con->prepare("INSERT INTO `groups` (GroupID, GroupName, Description, progress, recruitInfo) VALUES (:groupName, :memberName, :description, :progress, :recruit)");
            $sign_stmt->execute(array(':groupName' => $name, ':memberName' => $members, ':description' => $description,  ':progress' => $progress, ':recruit' => $recruit));

            header("Location: project.php");
            exit;
            }
          }
        ?>

        <input class="input-field" type="text" id="groupName2" name="newName" placeholder="New group name..." rows="1" maxlength="25"></input>

        <input class="input-field" type="text" id="description" name="newDescription" placeholder="Add new description..." rows="1" maxlength="150"></input><br>




        <input class="input-field" type="text" id="groupMembers" name="addedMembers" placeholder="Add members..." rows="1" maxlength="25"></input>
        <label for="user-data-form" type="button" class="addButton" id="addMembers" value="Save" name="save" onclick="">ADD</label><br>




        <input class="input-field" type="text" id="progress" name="newProgress" placeholder="Add project progress..." rows="1" maxlength="50"></input>
        <label for="user-data-form" type="button" class="addButton" id="addProgress" value="Save" name="save" onclick="">ADD</label><br>




        <input class="input-field" type="text" id="recruitInfo" name="newRecruit" placeholder="Recruting..." rows="1" maxlength="25"></input>

        <label for="user-data-form" type="button" class="addButton" id="saveRecruit" value="Save" name="save" onclick="">ADD</label><br>




        <label for="user-data-form" type="button" class="addButton" id="clearBtn" value="Clear" name="savebtn" onclick="clearFields();">Clear All</label>

        <label for="user-data-form" type="button" class="addButton" id="submitBtn" value="Submit" name="submitbtn" onclick="submitForms();">Submit</label>

      </form>

    </div>
    </div>
    <?php include('../resources/footer.php'); ?>
  </body>
  <script type="text/javascript">
    function clearFields() {
      document.getElementById("groupName2").value = "";
      document.getElementById("description").value = "";
      document.getElementById("progress").value = "";
      document.getElementById("recruitInfo").value = "";
      document.getElementById("groupMembers").value = "";
    };
  </script>
</html>