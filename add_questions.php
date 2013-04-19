<?php 
/*
    File Name: add_questions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that it displayed that allows the creator of a survey to add questions to it. 
*/


$page_name = "Add Questions to Survey";

include "functions/functions.php";
include 'partials/html_header.php'; 

//Including this partial will set the value of the $survey_number, $survey, $survey_type and $questions
include 'partials/get_survey.php'; 
$question_count = $survey['question_count'];

if ($logged_in_profile['id'] != $survey['creator_id']) :
  set_message("error", "You do not have permission to edit this survey.");
  header('Location: index.php');
  die;
endif;

//Check if the survey already has questions associated with it and redirect if true
if (!empty($questions) ) :
  set_message("error", "Survey already has questions associated with it.");
  header('Location: index.php');
  die;
endif;

//Set each of the question variables to be blank by default. This allows the form to be sticky by default
for ($i=1; $i <= $question_count; $i++):
  ${"question_". $i} = '';
endfor;

// if the user submitted the form (with method="post")
if (!empty($_POST)) :

  //loop through each of the questions and check if blank
  for ($i=1; $i <= $question_count; $i++):
    if (($_POST['question_'.$i]) == "") :
      $errors[] = "Question #". $i . " cannot be blank";
      //Add the name of the field to the field_errors array
      $field_errors[] = 'question_'.$i;
    endif;

    if ($survey_type == 'Multiple Choice') :
      foreach(range('A','D') as $d) :
        ${"question_". $i .'_answer_'.$d} =  $_POST["question_". $i .'_answer_'.$d];
        if (($_POST["question_". $i .'_answer_'.$d]) == "") :

          $errors[] = "Question #". $i . " Answer ". $d ." cannot be blank";
          //Add the name of the field to the field_errors array
          $field_errors[] = "question_". $i .'_answer_'. $d;
        endif;      
      endforeach;
    endif;
  endfor;

  //If there are no validation errors attempt to save the questions to the database
  if (empty($errors)) :

    //loop through each of the questions and save to the database.
    for ($i=1; $i <= $question_count; $i++) :
      //Assign the question variable the current counter variable question
      $question = $_POST['question_'. $i];
      //Call the add question function
      $question_number = add_question($survey_number, $question, $survey_type);

      //Submit the answers based on the type of survey
      if ($survey_type == "Multiple Choice") :
      //Loop through each of the answers and save each to the database 
        foreach(range('A','D') as $d) :
          //Assign the answer variable the current answer 
          $answer = $_POST['question_'. $i . '_answer_'. $d];
          //Call the add answer function
          add_answer($question_number, $answer);
        endforeach;  
      else :
        //Since the survey type is agree or disagree we are going to add the default answers for surveys of this type.
        $answer = "Agree";
        add_answer($question_number, $answer);
        $answer = "Disagree";
        add_answer($question_number, $answer);        
      endif;     
    endfor;
    $start_date = strtotime($survey['start_date']);
    $end_date = strtotime($survey['end_date']);
    $now = strtotime(date('Y-m-d'));    
    set_message("success", "Questions have been added to the survey");
    if ($end_date > $now && $start_date < $now) :
      header('Location: survey.php?survey='.$survey_number);   
      die;
    else:
      header('Location: my_surveys.php'); 
      die;   
    endif;
    
  
  else :
    //There is an error on the page. Maintain sticky variables.
    //Loop through each question and save the post value to a variable
    for ($i=1; $i <= $question_count; $i++):
      ${"question_". $i} = $_POST['question_'.$i];
    endfor;
  endif;//end the if statement to check if there are errors or not    
endif;//end the if statement if the form has been submitted

?>
	<body>
		<?php include 'partials/header.php'; ?>
		<!-- Main Page Content and Sidebar -->
	    <div class="row">
			<!-- Main Blog Content -->
			<div class="large-9 columns" role="content">
		
				<h2>Adding Questions for Survey:</h2>
				<h3>"<?php echo $survey['name']; ?>"</h3>

				<?php include 'partials/messages.php'; ?>
				
				<p>This is a <?php echo $survey_type; ?> survey.</p>
				
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

				    <?php 
				    //Loop through each of the questions until the question count is reached
				    for ($i=1; $i <= $question_count; $i++):
				        //Use the create_question to create a textbox for the current question
				        echo create_question($i, ${"question_". $i}, $field_errors );
				        //If the survey type is multiple choice then loop through A-D
				        if ($survey_type == 'Multiple Choice') :
				          foreach(range('A','D') as $d) :
				            
				            if (isset(${"question_". $i .'_answer_'.$d})) :
				              echo create_answer($i, $d, ${"question_". $i .'_answer_'.$d}, $field_errors);
				            else :
				              echo create_answer($i, $d, "", $field_errors);
				            endif; //End if statement to check if current answer is set
				            
				          endforeach;
				        endif;
				        echo "<br>";
				    endfor;
				    
				    echo create_hidden_survey_id_field($survey['id']); 
				
				    ?>
	    			<br>
	    			<input type="submit" value="Submit" class="button">
  				</form>  
			</div>
			<?php include 'partials/sidebar.php' ?>
		</div>
		
  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>