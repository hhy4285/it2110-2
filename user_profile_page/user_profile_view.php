<!DOCTYPE html>
<html>
  <head>
    <title>Group 7</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="../resources/style.css" />
    <link type="text/css" rel="stylesheet" href="resources/style_user_page.css" />
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Suez+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

            <!-- display resume button -->
            <input type="button" id="viewResume" value="View Resume" onclick="" />

          </th>
          <th>
            <div id="user-data-form-wrapper">

              <!-- form for user data, should pull current values from database to fill fields -->
              <form id="user-data-form">
                <!-- name data -->
                <textarea class="input-field" type="text" id="firstname" placeholder="First Name" rows="1" maxlength="25"></textarea><br>
                <textarea class="input-field" type="text" id="lastname" placeholder="Last Name" rows="1" maxlength="25"></textarea><br>

                <textarea class="input-field" type="text" id="preferredjob" placeholder="Preferred Job" rows="1" maxlength="25"></textarea><br>

                <!-- top skills input -->
                <textarea class="input-field" type="text" id="skill-1" placeholder="Skill 1" rows="1" maxlength="25"></textarea>
                <textarea class="input-field" type="text" id="skill-2" placeholder="Skill 2" rows="1" maxlength="25"></textarea><br>
                <textarea class="input-field" type="text" id="skill-3" placeholder="Skill 3" rows="1" maxlength="25"></textarea>
                <textarea class="input-field" type="text" id="skill-4" placeholder="Skill 4" rows="1" maxlength="25"></textarea><br>

                <textarea class="large-input-field" type="text" id="contact-email" placeholder="Contact Email" rows="1" maxlength="50"></textarea><br>

                <textarea id="biography" class="input-field" type="text" placeholder="Biography..." rows="8" maxlength="440"></textarea>


              </form>
              

            </div>

          </th> 
        </tr>
      </table>

    </div>
    <?php include('../resources/footer.php'); ?>

  </body>
</html>