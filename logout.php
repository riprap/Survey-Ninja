<?php 
/*
    File Name: logout.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The logout page that destroys the user session and returns to the index page.
*/
include "functions/functions.php";
session_destroy();
set_message("success", "You have successfully logged out.");
header("Location: login.php");
