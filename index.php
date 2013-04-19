<?php
/*
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the site which displays an introduction and links to other 
    sections of the site. 
*/
 
$page_name = "Home";
include "functions/functions.php";
include 'partials/html_header.php'; 

?>
  <body>

  <?php include 'partials/header.php'; ?>
  <div class="row">
    <div class="large-9 columns" role="content">
      <h3>
        <?php echo $page_name;?>
      </h3>
      <?php include 'partials/messages.php'; ?>
      <ul>
        <?php if (isset($logged_in_profile)) : ?>
          <li><a href="create_survey.php">Create a Survey</a></li>
          <li><a href="my_surveys.php">View your Surveys</a></li>
          <li><a href="list_surveys.php">Take a Survey</a></li>
          <li><a href="profile.php">View your Profile.</a></li>
        <?php
        else : ?>
          <li>
          	<a href="list_surveys.php">Take a Survey</a>
          </li>
          <li>
          	<a href="login.php">Login</a> to Create and Manage Surveys
          </li>
          <li>
          	<a href="register.php">Register</a> if you are new
          	and want to to Create and Manage Surveys
          </li>
        <?php
        endif;?>

      </ul>
    </div>
	<?php include 'partials/sidebar.php' ?>
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>