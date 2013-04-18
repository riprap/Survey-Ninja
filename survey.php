<?php 
/*
    File Name: survey.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that shows a survey and allows it to be filled in and submitted.
*/

$page_name = "Take Survey";

include "functions/functions.php";
include 'partials/html_header.php'; 

if (!empty($_POST)) {
  $survey_number = $_POST['survey'];
}
else if (!empty($_GET['survey'])) {
  $survey_number = $_GET['survey'];
}
else {
  set_message("error", "Invalid survey id.");
  header('Location: index.php');
  die;
}

$survey = get_survey($survey_number);

if (empty($survey)) {
  set_message("error", "There is no survey with the specified ID");
  header('Location: index.php');
  die;
} 

$start_date = strtotime($survey['start_date']);
$end_date = strtotime($survey['end_date']);
$now = strtotime(date('Y-m-d'));

if ($end_date < $now) {
  set_message("error", "We're sorry, this survey is closed.");
  header('Location: index.php');
  die;
} 
else if ($start_date > $now) {
  set_message("error", "This survey is not open yet. Please come back on: ". format_date($survey['start_date']));
  header('Location: index.php');
  die;
}

$survey_type = $survey['survey_type'];
$question_count = $survey['question_count'];
$questions = get_questions($survey_number);

if (!empty($_POST)) :

  $survey_number = $_POST['survey'];

  foreach ($questions as $question):

    if (empty($_POST['question_'. $question['id']])):
      $errors[] = "Please answer question: ". $question['text'];
    endif; //End the if statement to check if the answer to the question is blank 

  endforeach; // End the foreach to loop through each of the questions 

  //If there are no validation errors save the answers
  if (empty($errors)) :
    $submission_id = add_submission($survey_number, $_SERVER['REMOTE_ADDR']);
    //Loop through each of the questions and save the corresponding answers
    foreach ($questions as $question): 
      $answer = $_POST['question_'. $question['id']];  
      add_submission_answer($survey_number, $question['id'], $answer, $submission_id); 
    endforeach; //end the foreach to loop through and save each answer for the survey.

    //Set message, redirect to the index page
    set_message("success", "Thanks for completing the survey.");
    header('Location: index.php');
    die;
  endif; //End the if statement to check if there were any errors on the form 

endif; //End of if statement that executes if the form has been submitted

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1>Welcome to The: <?php echo $survey['name']; ?> Survey</h1>

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
              
              if (isset($_POST['question_'. $question['id']])) :
                $selected_value = $_POST['question_'. $question['id']];
              endif; //End the if statement that checks if the post value of the current question has been set

              foreach ($answers as $answer):
                  $selected = '';
                  if ($answer['id'] == $selected_value): 
                    $selected = 'checked="checked"';
                  endif ?>


                <input type="radio" name="question_<?php echo $question['id'];?>" <?php echo $selected; ?>  value="<?php echo $answer['id']; ?>"><?php echo $answer['text']; ?>
                <br>                  
         <?php endforeach; //End the foreach that loops through each answer

        endforeach; //End the foreach that loops through each question
        ?>
      </ul>
      <?php echo create_hidden_survey_id_field($survey['id']); ?>
      <input type="submit" value="Submit Survey"/>
    </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>
