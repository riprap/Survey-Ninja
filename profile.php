<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the sitee which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "My Profile";
include "functions/functions.php";
include 'partials/html_header.php'; 
//get_login();

//$logged_in_profile = get_profile();
?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>
    <? echo $page_name;?>
  </h1>

  <div id="profile">
    Name: <?php echo "user name"; ?>
    <br>
    Email: <?php echo "user email"; ?>
    <br>
    Edit My Profile
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>