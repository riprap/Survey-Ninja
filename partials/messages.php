<?php
/*
    File Name: header.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains the header with site title and logo that is used on all desktop pages of the site.
*/  
$messages = get_messages();    
?>



   <div id="errors">
    <?php
      //Loop over each error in the errors array and print any errors that exist. 
      if (isset($messages['error'])) {
        foreach ($messages['error'] as $error) {
          echo "<p>$error</p>";
        }
      }
    ?>
  </div>
   <div id="success">
    <?php
      //Loop over each success in the success array and print any success that exist. 
      if (isset($messages['success'])) {
        foreach ($messages['success'] as $success) {
          echo "<p>$success</p>";
        }        
      }

    ?>
  </div>

