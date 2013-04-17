<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the site which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "Home";
include "functions/functions.php";
include 'partials/html_header.php'; 
//$logged_in_profile = get_profile();

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

    <?php include 'partials/messages.php'; ?>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>