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
$errors = array();
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


// if the user submitted the form (with method="post")
if (!empty($_POST)) {
  //loop through each of the questions and check if blank
  for ($i=1; $i <= $question_count; $i++){
    if (empty($_POST['question_'.$i])) {
      $errors[] = "Question #". $i . " cannot be blank";
    }
  }
  //If there are no validation errors attempt to save the questions to the database
  if (empty($errors)) {

    //loop through each of the questions and save to the database.
    for ($i=1; $i <= $question_count; $i++) {
      //Assign the question variable the current counter variable question
      $question = $_POST['question_'. $i];
      //Call the add question function
      $question_number = add_question($survey_number, $question, $survey_type);
      //Loop through each of the answers and save each to the database 
      foreach(range('A','D') as $d) {
        //Assign the answer variable the current answer 
        $answer = $_POST['question_'. $i . '_answer_'. $d];
        //Call the add answer function
        add_answer($question_number, $answer);
      }       
    }    
  }
  else {
    //There is an error on the page. Maintain sticky variables.
    //Loop through each question and save the post value to a variable
    for ($i=1; $i <= $question_count; $i++){
      ${"question_". $i} = $_POST['question_'.$i];
    }
  }    
}



?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php
    //Loop over each error in the erros array and print any errors that exist. 
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
  ?>

  <?php include 'partials/header.php'; ?>
  <h1>Adding Questions for Survey: <? echo $survey['name']; ?> </h1>
  <p>This is a <? echo $survey_type; ?> survey. Each question must be filled in and include four possible answers.</p>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <?php if ($survey_type == 'multiple_choice') {?>
      <?php for ($i=1; $i <= $question_count; $i++){ ?>
        <p>
          <label>
            Question #<?php echo $i;?>:<br/>
            <input type="text" name="question_<?php echo $i;?>" value="<?php echo ${"question_". $i};?>"/>
          </label>
          
          <?php foreach(range('A','D') as $d) { ?>
            <br/>
            <label>
              Answer <? echo $d;?>:<br/>
              <input type="text" name="question_<?php echo $i;?>_answer_<?php echo $d;?>" value=""/>
            </label>        
          <?php } ?>

        </p>
      <?php }?>
    <?php }?>
    <input type="hidden" name="survey_id" value=<? echo $survey['id']; ?> />

    <input type="submit" value="Submit"/>

  </form>  

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>