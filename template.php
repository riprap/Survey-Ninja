<!DOCTYPE html>
<!--
    File Name: 
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description:  
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
  <h1>
    <?php echo $page_name;?>
  </h1>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>