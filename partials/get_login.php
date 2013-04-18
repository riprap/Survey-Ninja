<?php 
/*
    File Name: get_login.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This partial checks if the session id is set and performs the necessary actions
*/

if (empty($_SESSION['id'])) :
  set_message("error", "You must be logged in to access this page.");
  header('Location: login.php');
  die;
endif;
 
$logged_in_profile = get_user($_SESSION['id']);