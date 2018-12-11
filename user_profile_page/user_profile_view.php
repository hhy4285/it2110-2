<?php include('../resources/header.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>View Profile</title>
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

            <!-- Button to Open Linkdin Link --> 
            <button type="button" class="view-page-buttons" id="open-linkdin" onclick="window.open('https://www.linkedin.com/');">Linkedin</button>

            <br><br>

            <!-- Button to Edit User Page if On Own Page --> 
            <?php
            if($_GET['target'] == $_SESSION['username'])
            echo
              '<button type="button" class="view-page-buttons" id="edit-my-profile" onclick="openEdit();">Edit</button>
              <script type="text/javascript">
                function openEdit() {
                  window.open("user_profile.php");
                }
                </script>';
              ?>
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

                $UserName = $_GET['target'];
                //$UserName = $_SESSION['username'];

                $sql = "SELECT * FROM users WHERE username='".$UserName."' LIMIT 1";
                $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                /*
                // populate linkdin button 
                $linkdin_sql = "SELECT LinkdinLink FROM users WHERE username='".$UserName."' LIMIT 1";
                $linkdin_link = mysqli_query($conn, $linkdin_sql) or die (mysqli_error($conn));
                echo $linkdin_link;
                */

                //echo "<table>";
                while($row = mysqli_fetch_assoc($result)){
                  $image_data = $row['image'];
                  //echo '<img src="data:image/png;base64,'.base64_encode( $image_data ).'"/>';
                  $new_image_attr = "data:image/png;base64,".base64_encode( $image_data );
                  //document.getElementsById("display-image").setAttribute("scr", "data:image/png;base64,'.base64_encode( $image_data ).'");

                  echo "<script type='text/javascript'>
                          document.getElementById('display-image').setAttribute('src', '".$new_image_attr."');
                        </script>";
                  
                  $linkdin = $row['LinkdinLink'];
                  $js_code = 'window.open("'.$linkdin.'");';
                  echo "
                    <script type='text/javascript'>
                      document.getElementById('open-linkdin').setAttribute('onclick', '".$js_code."');
                    </script>
                  ";
                                    
                  $first_name = $row['FirstName'];
                  $last_name = $row['LastName'];
                  $email = $row['Email'];
                  $skill_1 = $row['Skill1'];
                  $skill_2 = $row['Skill2'];
                  $skill_3 = $row['Skill3'];
                  $skill_4 = $row['Skill4'];
                  
                  $preferred_job = $row['PreferredJob'];
                  $biography = $row['Biography'];
                  echo "<h3>".$first_name." ".$last_name."</h3>
                        <ul style=''>
                          <li>Job: ".$preferred_job."</li>
                          <li>Contact: ".$email."</li>
                          <li>Skills: ".$skill_1."; ".$skill_2."; ".$skill_3."; ".$skill_4."</li>
                          <li style='white-space: normal;'>Biography: ".$biography."</li>
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