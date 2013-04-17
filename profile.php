<!DOCTYPE html>
<!--
    File Name: profile.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that shows all the details of the current user's profile.
-->

<?php 
$page_name = "My Profile";
include "functions/functions.php";
include 'partials/html_header.php';
if (empty($_SESSION['id'])){
	header('Location: login.php');
}
$logged_in_profile = get_user($_SESSION['id']);

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>
    <?php echo $page_name;?>
  </h1>

  <div id="profile">
    Name: <?php echo $logged_in_profile['name']; ?>
    <br>
    Email: <?php echo $logged_in_profile['email']; ?>
    <br>
    Edit My Profile
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>