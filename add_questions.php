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
//$logged_in_profile = get_profile();

if (!empty($_GET['survey'])) {
  $survey_number = $_GET['survey'];
}

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
  <h1>Adding Questions for Survey # <? echo $survey_number; ?> </h1>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>