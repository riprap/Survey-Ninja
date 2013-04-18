<?php
/*
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the site which displays an introduction and links to other 
    sections of the site. 
*/
 
$page_name = "Home";
include "functions/functions.php";

include 'partials/html_header.php'; 

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
  <?php include 'partials/messages.php'; ?>
  <div class="row">
    <div class="large-9 columns" role="content">
      <h3>
        <?php echo $page_name;?>
      </h3>
      <ul>
        <li><a href="create_survey.php">Create a Survey</a></li>
        <li><a href="my_surveys.php">View your Surveys</a></li>
        <li><a href="list_surveys.php">Take a Survey</a></li>
        <li><a href="profile.php">View your Profile.</a></li>
      </ul>
    </div>

    <?php $surveys = get_active_surveys(); 
    $survey = $surveys[array_rand($surveys)];?>
    <aside class="large-3 columns">
        <div class="panel">
          <h5>Featured Survey</h5>
          <p><?php echo $survey['name'];?></p>
          <a href="survey.php?id=<?php echo $survey['id']; ?>">Take Survey</a>
        </div>
      </aside>
    <!-- End Sidebar -->
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>