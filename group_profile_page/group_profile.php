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
    <div id="container">
    <div id="profile_block">
      <h1 id="groupName">Group 7</h1>
      <button id="joinRequest" type="submit">Join Request</button>
      <button id="editBtn"><a href="group_profile_edit.php">Edit</a></button>
      <div class="blocks" id="abstract">
        <h2 class="title2">Description:</h2><br>
        "Group 7" is a project group in Websystem Develoment class. The objective of the project is to create a platform that can connect potential leaders and members for their projects within an established network
      </div>
      <div class="border"></div>
      <div id="">
        
      </div>
      <div class="blocks" id="group_members">
        <h2 class="title2">Group Members:</h2>
        <ul>
          <li><a href="#"> Name 1 </a></li>
          <li><a href="#"> Name 2 </a></li>
          <li><a href="#"> Name 3 </a></li>
          <li><a href="#"> Name 4 </a></li>
        </ul>
      </div>
      <div class="border"></div>

      <div class="blocks" id="projectProgress">
        <h2 class="title2">Project Progress:</h2>
        <ul>
          <li>Planning (Complete)</li>
          <li>Front-end (In progress)</li>
          <li>Back-end (In progress)</li>
        </ul>
      </div>
      <div class="border"></div>

      <div class="blocks" id="recruitInfo">
        <h2 class="title2">We are looking for:</h2>
        <ul>
          <li>One web developer</li>
          <li>Visual design artist</li>
          <li>Marketing specialist</li>
        </ul>
      </div>

    </div>
    </div>
    <?php include('../resources/footer.php'); ?>
  </body>
</html>
