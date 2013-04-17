<?php
/*
    File Name: select_year.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: A partial with a set list of predefined years
*/  
for( $i = date("Y"); $i <= date("Y") + 5; $i++)
      echo "<option value='$i'>$i</option>";
            