<!DOCTYPE html>
<html>
  <head>
    <title>Group 7</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="resources/style.css" />
  </head>

  <header>
    <ul id="homebar">
    </ul>
  </header>

  <body>

    <div id="user-acount-page-wrapper">
      <table style="width:70%; margin: auto;">
        <tr>
          <th style="float: right;">

            <!-- profile photo, on click bring up file browser to pick new image, save to database -->
            <div id="image-wrapper">
              <input type="image" src="default_user_photo.jpg" alt="User Photo" width="170px" height="170px" />
              <input type="file" id="user_photo" style="display: none;" />
              <script type="text/javascript">
                $("input[type='image']").click(function() {
                  $("input[id='user_photo']").click();
                });
              </script>
            </div>

            <!-- link to resume, on click, open in new tab -->
            <a href="default_user_resume.pdf" target="_blank">Resume</a>
            
            <!-- list of links to all groups user is part of, pull from database -->
            <ul id="all-groups" style="list-style-type: none;">
              ALL GROUPS
              <li>Group 1</li>
              <li>Group 2</li>
              <li>Group 3</li>
            </ul>

          </th>
          <th>
            <div id="user-data-form-wrapper">

              <!-- form for user data, should pull current values from database to fill fields -->
              <form>
                <input type="text" name="firstname" placeholder="First Name"><br>
                <input type="text" name="lastname" placeholder="Last Name"><br>
                <input type="text" name="lastname" placeholder="Skills"><br>
                <input type="text" name="lastname" placeholder="Biography..." style="width: 400px; height: 300px;">
              </form>
              
              <!-- button to save current form data to database -->
              <button type="button" onclick="alert('Current Data Saved!')">Save</button>
            </div>

          </th> 
        </tr>
      </table>
    </div>
    <footer>© Copyright 2018, RPI | Group 7</footer>
  </body>
</html>