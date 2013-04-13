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

if (!empty($_POST)) {
  $survey_number = $_POST['survey_id'];
}
else if (!empty($_GET['survey'])) {
  $survey_number = $_GET['survey'];
}
// else if no survey. DIE
$survey = get_survey($survey_number);
$survey_type = $survey['survey_type'];
$question_count = 5;
$questions = get_questions($survey_number);

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>Welcome to The: <? echo $survey['name']; ?> Survey</h1>

  <?php foreach ($questions as $question): ?>

    <li>
        <h2><?php echo htmlentities($question['text']) ?></h2>
    </li>
    <li>
        <?php echo htmlentities($question['text']) ?>
    </li>
  <?php endforeach; ?>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>