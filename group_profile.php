<!DOCTYPE html>
<html>
  <head>
    <title>Group Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="resources/style.css"/>
    <link type="text/css" rel="stylesheet" href="resources/style_group_profile.css"/>
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Suez+One" rel="stylesheet">
  </head>

  <header>
    <ul id="homebar">
      <li><a href="index.php"> HOME </a></li>
      <div class="right">
        <li><a href="user_profile.html"> LOG OUT </a></li>
        <li><a href="login.html"> LOGIN </a></li>
      </div>
    </ul>
  </header>

  <body>
    <div id="cotainer">
    <div id="profile_block">
      <h1 id="groupName">Group 7</h1>
      <button id="joinRequest" type="submit">Join Request</button>
      <div class="blocks" id="abstract">
        <h2 class="title2">Abstract:</h2><br>
        "Group 7" is a project group in Websystem Develoment class. The objective of the project is to create a platform that can connect potential leaders and members for their projects within an established network.
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
          <li>1. Planning (Complete)</li>
          <li>2. Front-end (In progress)</li>
          <li>3. Back-end (In progress)</li>
        </ul>
      </div>
      <div class="border"></div>

      <div class="blocks" id="recruitInfo">
        <h2 class="title2">We are looking for:</h2>
        <ul>
          <li>1. One web developer</li>
          <li>2. Visual design artist</li>
          <li>3. Marketing specialist</li>
        </ul>
      </div>

    </div>
    </div>
    <?php include('resources/footer.php'); ?>
  </body>
</html>
