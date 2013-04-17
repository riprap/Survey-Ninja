<!DOCTYPE html>
<!--
    File Name: details.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The survey details page that shows all of the details of a specific survey.
-->

<?php 
$page_name = "Survey Details";
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
$survey['question_count'];
$questions = get_questions($survey_number);

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>
    Showing Details for Survey: <?php echo $survey['name']; ?> 
  </h1>

    <h2>
      Total submissions:
      <?php 
        echo get_submission_count($survey['id']);
      ?>
    </h2>


    <?php 
    foreach ($questions as $question): 
    ?>
      <li id="question">
          <h2><?php echo htmlentities($question['text']) ?></h2>
      </li>
      <?php
        $answers = get_answers($question['id']);
        foreach ($answers as $answer):
      ?>

        <li id="answer">
          <?php echo $answer['text']; ?>:
          <?php echo get_answer_count($answer['id']);?> Person
        </li>

      <?php 
        endforeach; 
      ?>

    <?php 
    endforeach; 
    ?>




  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>