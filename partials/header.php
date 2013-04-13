<?php
/*
    File Name: header.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains the header with site title and logo that is used on all desktop pages of the site.
*/  
?>
        <div class="header-container">
            <header class="wrapper clearfix">
                
                <?php
                //Check log in status and include the appropriate navbar 
                include 'logged_in_nav.php'; 
                ?>
                <?php echo $site_title; ?>
            </header>
        </div>