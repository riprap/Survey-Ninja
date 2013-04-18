<?php
/*
    File Name: logged_out_nav.php 
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The navbar that a user will see if they are not logged in;
*/
?>
<div class="row">
    <div class="large-12 columns">
      <div class="nav-bar right">
       <ul class="button-group">
       	 <li><a href="login.php" class= "button">Login</a></li>
       	 <li><a href="register.php" class= "button">Register</a></li>
         <li><a href="list_surveys.php" class="button">Take a survey!</a></li>
        </ul>
      </div>
      <h1><a href="index.php"><?php echo $site_name;?></a></h1>
      <hr />
    </div>
</div>