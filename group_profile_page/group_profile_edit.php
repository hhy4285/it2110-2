<?php
include("resources/header.php");
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
      <form id="user-data-form" method="post" action="user_profile.php">
        <textarea class="input-field" type="text" id="groupName2" placeholder="New group name..." rows="1" maxlength="25"></textarea>

        <textarea class="input-field" type="text" id="description" placeholder="Add new description..." rows="1" maxlength="150"></textarea><br>

        <textarea class="input-field" type="text" id="groupMembers" placeholder="Add members..." rows="1" maxlength="25"></textarea>
        <label for="user-data-form" type="button" class="addButton" id="addMembers" value="Save" name="save" onclick="">ADD</label><br>

        <textarea class="input-field" type="text" id="progress" placeholder="Add project progress..." rows="1" maxlength="50"></textarea>
        <label for="user-data-form" type="button" class="addButton" id="addProgress" value="Save" name="save" onclick="">ADD</label><br>

        <textarea class="input-field" type="text" id="recruitInfo" placeholder="Recruting..." rows="1" maxlength="25"></textarea>
        <label for="user-data-form" type="button" class="addButton" id="saveButton" value="Save" name="save" onclick="">ADD</label><br>

        <label for="user-data-form" type="button" class="addButton" id="submitBtn" value="Submit" name="submitbtn" onclick="">Submit</label>
      </form>

    </div>
    </div>
    <?php include('../resources/footer.php'); ?>
  </body>
</html>