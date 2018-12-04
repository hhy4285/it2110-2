<?php include('../resources/header.php'); ?>

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
      <h1>Profile</h1>
      <table id="table-outer">
        <tr>
          <th style="float: right;">
            <!-- profile photo, on click bring up file browser to pick new image, save to database -->
            <div id="image-wrapper">
              <form id="image-upload-form" enctype="multipart/form-data" action="" method="post">    

                <img id="display-image" src="resources/default_user_photo.png" alt="User Photo" width="170px" height="170px"/><br>

              </form>
            </div><br>

            <input id="input-image" type="file" onchange="readURL(this);" />

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
          <th style="vertical-align: top;">
            <div id="user-data-wrapper">
              <!-- get this user data from database -->
              <?php    
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

                //echo "<table>";
                while($row = mysqli_fetch_assoc($result)){
                  $first_name = $row['FirstName'];
                  $last_name = $row['LastName'];
                  $email = $row['Email'];
                  $skills = $row['Skills'];
                  $preferred_job = $row['PreferredJob'];
                  $biography = $row['Biography'];
                  echo "<h3>".$first_name." ".$last_name."</h3>
                        <ul style=''>
                          <li>Job: ".$preferred_job."</li>
                          <li>Contact: ".$email."</li>
                          <li>Skills: ".$skills."</li>
                          <li>Biography: ".$biography."</li>
                        </ul>";   
                }
                //echo "</table>";
              ?>
              
            </div>

          </th> 
        </tr>
      </table>

      
    </div>
    <?php include('../resources/footer.php'); ?>
  </body>
</html>