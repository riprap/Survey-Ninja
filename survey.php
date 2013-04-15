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
  $survey_number = $_POST['survey'];
}
else if (!empty($_GET['survey'])) {
  $survey_number = $_GET['survey'];
}
else {
  header('Location: index.php');
  die;
}


$survey = get_survey($survey_number);

if (empty($survey)) {
  set_message("error", "There is no survey with the specified ID");
  header('Location: index.php');
  die;
}


$survey_type = $survey['survey_type'];
$question_count = $survey['question_count'];
$questions = get_questions($survey_number);


if (!empty($_POST)) {
  $survey_number = $_POST['survey_id'];
  //Loop through each of the questions and save the corresponding answer
  $submission_id = add_submission($survey_number, $_SERVER['REMOTE_ADDR']);
  foreach ($questions as $question): 
    if (!empty($_POST['question_'. $question['id']])) {
      $errors[] = "Please enter your name.";
      $answer = $_POST['question_'. $question['id']];
      $question_id = $question['id'];
      add_submission_answer($survey_number, $question_id, $answer, $submission_id);
    }  
      
  endforeach;


}


?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>Welcome to The: <? echo $survey['name']; ?> Survey</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <ul>
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
            <input type="radio" name="question_<?php echo $question['id'];?>" value="<?php echo $answer['id']; ?>"><?php echo $answer['text']; ?><br>
          <?php 
            endforeach; 
          ?>

        <?php 
        endforeach; 
        ?>
      </ul>
      <input type="hidden" name="survey" value=<? echo $survey['id']; ?> />
      <input type="submit" value="Submit Survey"/>
    </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>