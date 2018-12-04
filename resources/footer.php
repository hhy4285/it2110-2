<?php
	echo '<div id ="footer-container">
      		<footer>
	      		<table id="footer-organization">
						  <tr>	
						  	<th>
						  		<a id="git-icon" href="https://github.com/hhy4285/it2110-2.git" target="blank">
	          			<img src="../resources/github-icon.png" alt="Github" />
	      					</a>
	      				</th>			
						  <th><a href="../index.php">Home</a></th>';
						  if(isset($_SESSION['username'])){
								echo'<th><a href="user_profile_page/user_profile_view.php?target=' . $_SESSION['username'] .'">My Profile</a></th>';
								} else {
									echo'<th><a href="login/login.php">My Profile</a></th>';
								}
								if(is_null($dbid)){
									echo '<th><a href="#">My Group</a></th>';
								} else {
									echo '<th><a href="group_profile_page/group_profile.php?target=' . $dbid . '">My Group</a></th>';
								}
						  echo'</tr>
						</table>
	      			<p>© Copyright 2018, RPI | Group 7</p>
      		</footer>
    	</div>';
?>