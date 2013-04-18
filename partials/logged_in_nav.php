<?php
/*
    File Name: logged_in_nav.php 
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The navbar that a user will see if they are logged into the site.
*/ 
$logged_in_profile = get_user($_SESSION['id']);
?>
<div class="row">
    <div class="large-12 columns">
      <div class="nav-bar right">
       <ul class="button-group">
         
   	     <li><a href="profile.php" class="button"><?php echo substr($logged_in_profile['name'], 0, 20); ?></a></li>
    	 <li><a href="my_surveys.php" class="button">My Surveys</a></li>
 	     <li><a href="create_survey.php" class="button">Create New Survey</a></li>
  	     <li><a href="logout.php" class="button">Logout</a></li>
        </ul>
      </div>
      <h1><a href="index.php" class="site_name"><?php echo $site_name;?></a></h1>
      <hr />
    </div>
  </div>
</div>