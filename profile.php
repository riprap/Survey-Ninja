<?php
/*
    File Name: profile.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that shows all the details of the current user's profile.
*/

 
$page_name = "My Profile";
include "functions/functions.php";
include 'partials/html_header.php';
?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>
    <?php echo $page_name;?>
  </h1>

  <div id="profile">
    <a href="edit_profile.php">
      Edit My Profile
    </a> 
    <br>
    <br>    
    Name: <?php echo $logged_in_profile['name']; ?>
    <br>
    Email: <?php echo $logged_in_profile['email']; ?>
    <br>       
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>