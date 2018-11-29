<!DOCTYPE html>
<html>
  <head>
    <title>Group 7</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="resources/style.css" />
    <link type="text/css" rel="stylesheet" href="resources/style_user_page.css" />
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Suez+One" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <header>
    <ul id="homebar">
      <li><a href="index.php"> HOME </a></li>
      <div class="right">
        <li><a href="user_profile.php"> LOG OUT </a></li>
        <li><a href="login.html"> LOGIN </a></li>
      </div>
    </ul>
  </header>

  <body>

    <div id="user-acount-page-wrapper">
      <h1>Edit Profile</h1>
      <table id="table-outer">
        <tr>
          <th style="float: right;">

            <!-- profile photo, on click bring up file browser to pick new image, save to database -->
            <div id="image-wrapper">
              <input type="image" src="resources/default_user_photo.jpg" alt="User Photo" width="170px" height="170px" />
              <input type="file" id="user_photo" style="display: none;" />
              <script type="text/javascript">
                $("input[type='image']").click(function() {
                  $("input[id='user_photo']").click();
                });
              </script>
            </div><br>

            <!-- link to resume, on click, ask for file to link -->
            <input id="resumeInput" type="file" style="display:none;" />
            <input type="button" id="resumeButton" value="Resume" onclick="document.getElementById('resumeInput').click();" /><br>

            <br>
            <br>

            <table id="buttonTable">
              <tr>
                <th>
                  <!-- button to clear current form data to form -->
                  <button type="button" class="controleButton" id="clearButton" onclick="alert('Clear!')">Clear</button>
                </th>
                <th>
                  <!-- button to save current form data to database -->
                  <button type="button" class="controleButton" id="saveButton" onclick="alert('Current Data Saved!')">Save</button>
                </th>
              </tr>
              <tr>
                <th>
                  <!-- button to delete user from database -->
                  <button type="button" class="controleButton" id="deleteButton" onclick="alert('Are you sure you want to completely delete your account? All of your account data will be erased and unrecoverable.')">Delete</button>                  
                </th>
                <th>
                  <!-- button to exit out of edit mode and view the page normaly -->
                  <button type="button" class="controleButton" id="viewButton" onclick="window.location = 'user_profile_view.php';">View</button>               
                </th>
              </tr>
            </table>

          </th>
          <th>
            <div id="user-data-form-wrapper">

              <!-- form for user data, should pull current values from database to fill fields -->
              <form id="user-data-form">
                <!-- name data -->
                <textarea class="input-field" type="text" name="firstname" placeholder="First Name" rows="1" maxlength="25"></textarea><br>
                <textarea class="input-field" type="text" name="lastname" placeholder="Last Name" rows="1" maxlength="25"></textarea><br>

                <textarea class="input-field" type="text" name="preferredjob" placeholder="Preferred Job" rows="1" maxlength="25"></textarea><br>

                <!-- top skills input -->
                <textarea class="input-field" type="text" name="skill-1" placeholder="Skill 1" rows="1" maxlength="25"></textarea>
                <textarea class="input-field" type="text" name="skill-2" placeholder="Skill 2" rows="1" maxlength="25"></textarea><br>
                <textarea class="input-field" type="text" name="skill-3" placeholder="Skill 3" rows="1" maxlength="25"></textarea>
                <textarea class="input-field" type="text" name="skill-4" placeholder="Skill 4" rows="1" maxlength="25"></textarea><br>

                <textarea class="large-input-field" type="text" name="contact-email" placeholder="Contact Email" rows="1" maxlength="50"></textarea><br>

                <textarea id="biography" class="input-field" type="text" name="lastname" placeholder="Biography..." rows="8" maxlength="440"></textarea>


              </form>
              

            </div>

          </th> 
        </tr>
      </table>

      
    </div>
<?php include('resources/footer.php'); ?>
  </body>
</html>