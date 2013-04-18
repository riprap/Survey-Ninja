<?php
/*
    File Name: header.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains the header with site title and logo that is used on all desktop pages of the site.
*/  

//Check log in status and include the appropriate navbar 
if (is_logged_in() == true){
	include 'logged_in_nav.php'; 
}
else{
	include 'logged_out_nav.php';
}
?>
