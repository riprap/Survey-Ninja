<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the sitee which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "Home";
include "functions/functions.php";
include 'partials/html_header.php'; 
$logged_in_profile = get_profile();
?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <?php
  if (isset($_SESSION['new_register'])) {
        echo "Thanks for registering for " . $site_name . ". You have been automatically logged in.";
        unset($_SESSION['new_register']);
    }
  ?>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>