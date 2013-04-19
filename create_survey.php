<?php 
/*
    File Name: create_survey.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that allows a user to create a new instance of a survey.
*/

$page_name = "Create Survey";
include "functions/functions.php";

$survey_name = '';

//Get the values for the current date
list($start_day, $start_month, $start_year) = get_current_date();
list($end_day, $end_month, $end_year) = get_tomorrow_date();

// if the user submitted the form (with method="post")
if (!empty($_POST)) :

  if (($_POST['name']) == "") :
    $errors[] = "Please enter the survey name.";
    $field_errors[] = 'name';
  endif;
  
  //Including this partial will validate the date fields for start_date and end_date. It will set the values of $start_date and $end_date
  include "partials/date_validation.php";

  $question_count = $_POST['question_count'];
  $survey_type = $_POST['survey_type'];
  $survey_name = $_POST['name'];

  //If there are no validation errors attempt to create the survey
  if (empty($errors)) :
    //Create survey and get the id 
    $survey_id = add_survey($survey_name, $survey_type, $logged_in_profile['id'], $start_date, $end_date, $question_count);
    set_message("success", "Survey has been created");
    header('Location: add_questions.php?survey='.$survey_id);
  endif;
endif;

?>

<?php include 'partials/html_header.php'; ?>
  <body id="<?php echo strtolower($page_name);?>">
  
  <?php include 'partials/header.php'; ?>
  
  <div class="row">
    <div class="large-9 columns" role="content">

      <h3>
        <?php echo $page_name;?>
      </h3>
      
      <?php include 'partials/messages.php'; ?>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <label>Survey Name:</label>
        <input type="text" name="name" <?php echo check_field_errors('name', $field_errors); ?> value="<?php echo $survey_name; ?>">
        
        <label>Start Date:</label>

        <select name="start_month">
          <?php echo create_month_dropdown($start_month);?>    
        </select>

        <select name="start_day">
          <?php echo create_day_dropdown($start_day); ?> 
        </select>  

        <select name="start_year" id="year">
          <?php echo create_year_dropdown($start_year); ?>
        </select>                     

        <label>End Date:</label>

        <select name="end_month">
          <?php echo create_month_dropdown($end_month); ?>            
        </select>

        <select name="end_day">
          <?php echo create_day_dropdown($end_day); ?>          
        </select> 
        <select name="end_year" id="year">
          <?php echo create_year_dropdown($end_year); ?>
        </select>                                

        <label>Survey type:</label>
        <select name="survey_type">
          <?php
              if (isset($survey_type)) {
                echo create_survey_type_dropdown($survey_type);  
              }
              else {
                echo create_survey_type_dropdown();
              }   
          ?> 
        </select>          

        <label>Number of Questions:</label>
          <select name="question_count">
          <?php  
              if (isset($question_count)) {
                echo create_day_dropdown($question_count); 
              } else {
                echo create_day_dropdown(); 
              }
          ?>
          </select><br/>
        <input type="submit" value="Create Survey" class="button">
      </form>
    </div>
  </div>

  <?php include 'partials/footer.php'; ?>

  </body>
</html>