<?php 
/*
    File Name: create_survey.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that allows a user to create a new instance of a survey.
*/

$page_name = "Create Survey";
include "functions/functions.php";
include 'partials/html_header.php'; 

$name = '';
$start_date = '';
$end_date = '';

// if the user submitted the form (with method="post")
if (!empty($_POST)) :

  if (empty($_POST['name'])) :
    $errors[] = "Please enter the survey name.";
    $field_errors[] = 'name';
  endif;
  
  $start_day = $_POST['start_day'];
  $start_month = $_POST['start_month'];
  $start_year = $_POST['start_year'];

  $end_day = $_POST['end_day'];
  $end_month = $_POST['end_month'];
  $end_year = $_POST['end_year'];

  $question_count = $_POST['question_count'];

  //Survey type is the first value of the index passed to use from the select
  $survey_type = $_POST['survey_type'];
  $name = $_POST['name'];

  //Call Function to see if there is a survey with this name already
  // Check if it is a valid start_date
  $start_date = format_db_date($start_day, $start_month, $start_year);
  if (!$start_date) :
    $errors[] = 'Invalid Start Date';
  endif;      

  // Check if it is a valid end_date
  $end_date = format_db_date($end_day, $end_month, $end_year);
  if (!$end_date) :
    $errors[] = 'Invalid End Date';
  endif;  

  //Check if the end date is before the start date
  if ($start_date > $end_date) :
    $errors[] = 'Start Date cannot be after End Date';
  endif;

  //If there are no validation errors attempt to create the survey
  if (empty($errors)) :
    //No survey with this name exists yet. Create survey
    //Format the start_date 
    $survey_id = add_survey($name, $survey_type, $logged_in_profile['id'], $start_date, $end_date, $question_count);
    set_message("success", "Survey has been created");
    header('Location: add_questions.php?survey='.$survey_id);

  //There is an error on the page. Maintain sticky variables.
  else :   
    $name = $_POST['name'];
  endif;
endif;

?>

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
        <input type="text" name="name" <?php echo check_field_errors('name', $field_errors); ?> value="<?php echo $name ?>">
        
        <label>Start Date:</label>
        <select name="start_month">
              <?php 
                  if (isset($start_month)) {
                    echo create_month_dropdown($start_month);
                  } else {
                    echo create_month_dropdown(); 
                  }              
              ?>    
        </select>

        <select name="start_day">
              <?php  
                  if (isset($start_day)) {
                    echo create_day_dropdown($start_day); 
                  } else {
                    echo create_day_dropdown(); 
                  }            
              ?> 
              </select>  

              <select name="start_year" id="year">
                <?php 
                    if (isset($start_year)) {
                      echo create_year_dropdown($start_year);
                    } else {
                      echo create_year_dropdown();
                    }          
                ?>
        </select>                     

        <label>End Date:</label>
        <select name="end_month">
          <?php 
          if (isset($end_month)) {
            echo create_month_dropdown($end_month);
          } else {
            echo create_month_dropdown(); 
          }                
                ?>            
        </select>

        <select name="end_day">
          <?php  
            if (isset($end_day)) {
              echo create_day_dropdown($end_day); 
            } else {
              echo create_day_dropdown(); 
            }
          ?>          
        </select> 
        <select name="end_year" id="year">
                <?php 
                    if (isset($end_year)) {
                      echo create_year_dropdown($end_year);
                    } else {
                      echo create_year_dropdown();
                    }
                ?>
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