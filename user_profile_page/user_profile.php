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

    <!-- php to upload all form data to database or delete user for database -->
    <?php
      // connect to database
      try {
        $dbname = 'lab9';
        $user = 'root';
        $pass = '';
        $dbconn = new PDO('mysql:host=127.0.0.1;dbname='.$dbname, $user, $pass);
      }
      catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }

      // check if save button pressed  
      if (isset($_POST['save']) && $_POST['save'] == 'Save') {
        mysqli_query($conn,"UPDATE users SET column10 = VALUES('{$imgData}') WHERE UserID='".$UserID."' LIMIT 1");
      }
    ?>

    <div id="user-acount-page-wrapper">
      <h1>Edit Profile</h1>
      <table id="table-outer">
        <tr>
          <th style="float: right;">

            <!-- php to load image upload to database -->
            <?php
              session_start();
              $_SESSION['UserID'] = 1; // set user id for debugging
              
              $UserID = $_SESSION['UserID'];

              if (count($_FILES) > 0) {
                if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                  //require_once "db.php";
                  $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                  
                  $sql = "UPDATE users SET column10 = VALUES('{$imgData}') WHERE UserID='".$UserID."' LIMIT 1";
                  $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                  if (isset($current_id)) {
                    header("Location: listImages.php");
                  }
                }
              }
            ?>

            <!-- profile photo, on click bring up file browser to pick new image, save to database -->
            <div id="image-wrapper">
              <form id="image-upload-form" enctype="multipart/form-data" action="" method="post">    

                <img id="display-image" src="resources/default_user_photo.png" alt="User Photo" width="170px" height="170px"/><br>

                <!--
                <input id="display-image" type="image" src="resources/default_user_photo.jpg" alt="User Photo" width="170px" height="170px" />
                <input name="userImage" type="file" onchange="readURL(this);" id="user_photo" style="display: none;" accept="image/*"/>
              
                <script type="text/javascript">
                  $("input[type='image']").click(function() {
                    $("input[id='user_photo']").click();
                      $(document.getElementById("display-image").attr("src")) = ;
                  });
                </script>
                -->
              </form>
            </div><br>

            <input id="input-image" type="file" onchange="readURL(this);" />
            <label id="choose-file-button" for="input-image">Choose a Picture</label>
            <script type="text/javascript">
             function readURL(input) {
                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#display-image')
                          .attr('src', e.target.result)
                          .width(170)
                          .height(170);
                  };

                  reader.readAsDataURL(input.files[0]);
                }
              }              
            </script>

            <br>
            <br>

            <table id="buttonTable">
              <tr>
                <th>
                  <!-- button to clear current form data to form -->
                  <script type="text/javascript">
                    function clearFields() {
                      document.getElementById("firstname").value = "";
                      document.getElementById("lastname").value = "";
                      document.getElementById("preferredjob").value = "";
                      document.getElementById("skill-1").value = "";
                      document.getElementById("skill-2").value = "";
                      document.getElementById("skill-3").value = "";
                      document.getElementById("skill-4").value = "";
                      document.getElementById("contact-email").value = "";
                      document.getElementById("biography").value = "";
                    };
                  </script>
                  <button type="button" class="controleButton" id="clearButton" onclick="clearFields();">Clear</button>
                </th>
                <th>
                  <!-- button to save current form data to database -->
                  <label for="user-data-form" type="button" class="controleButton" id="saveButton" value="Save" name="save" onclick="alert('Current Data Saved!')">Save</label>
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
              <form id="user-data-form" method="post" action="user_profile.php">
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

                <textarea class="large-input-field" type="text" id="linkdin-link" placeholder="Linkdin Link" rows="1" maxlength="50"></textarea><br>

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