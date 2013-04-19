<?php
/*
    File Name: sidebar.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Ninja
    File Description: This partial contains the Featured Survey sidebar.
*/  	
$surveys = get_active_surveys();   

//Only show the sidebar if there is a survey in if 
if (!empty($surveys)) : 
  $survey = $surveys[array_rand($surveys)]; ?> 
  <aside class="large-3 columns">
      <div class="panel">
        <h5>Random Survey</h5>
        <p><?php echo $survey['name'];?></p>
        <a href="survey.php?survey=<?php echo $survey['id']; ?>">Take Survey</a>
      </div>
    </aside>
  <!-- End Sidebar -->    
 <?php 
endif;?>