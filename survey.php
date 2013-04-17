<!DOCTYPE html>
<!--
    File Name: survey.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that shows a survey and allows it to be filled in and submitted.
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
  set_message("error", "Invalid survey id.");
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
$errors = array();

if (!empty($_POST)) {
  $survey_number = $_POST['survey'];

  foreach ($questions as $question): 
    if (empty($_POST['question_'. $question['id']])) {
      $errors[] = "Please answer question: ". $question['text'];
    }  
  endforeach;



  //If there are no validation errors save the answers
  if (empty($errors)) :
    $submission_id = add_submission($survey_number, $_SERVER['REMOTE_ADDR']);
    foreach ($questions as $question): 
      if (!empty($_POST['question_'. $question['id']])) {
        $answer = $_POST['question_'. $question['id']];  
        $question_id = $question['id'];
        add_submission_answer($survey_number, $question_id, $answer, $submission_id);
      }  
    endforeach;

    set_message("success", "Thanks for completing the survey.");
    header('Location: index.php');
  endif;

}

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>Welcome to The: <? echo $survey['name']; ?> Survey</h1>

  <?php include 'partials/messages.php'; ?>

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


                $selected_value= '';
                
                if (isset($_POST['question_'. $question['id']])) {
                  $selected_value = $_POST['question_'. $question['id']];
                }

                foreach ($answers as $answer):
                    $selected = '';
                    if ($answer['id'] == $selected_value): 
                      $selected = 'checked="checked"';
                    endif ?>


                  <input type="radio" name="question_<?php echo $question['id'];?>" <?php echo $selected; ?>  value="<?php echo $answer['id']; ?>"><?php echo $answer['text']; ?><br>                  
           <?php endforeach; 

        endforeach; 
        ?>
      </ul>
      <?php echo create_hidden_survey_id_field($survey['id']); ?>
      <input type="submit" value="Submit Survey"/>
    </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>
