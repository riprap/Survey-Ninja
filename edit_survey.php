<?php 
/*
    File Name: create_survey.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that allows a user to create a new instance of a survey.
*/

$page_name = "Edit Survey";
include "functions/functions.php";
include 'partials/html_header.php'; 

//Including this partial will set the value of the $survey_number, $survey, $survey_type and $questions
include 'partials/get_survey.php'; 

$survey_name = $survey['name'];

if ($logged_in_profile['id'] != $survey['creator_id']) {  
  set_message("error", "You do not have permission to edit this survey.");
  header('Location: index.php');
  die;
}

list($start_day, $start_month, $start_year) = get_date_params($survey['start_date']);
list($end_day, $end_month, $end_year) = get_date_params($survey['end_date']);

// if the user submitted the form (with method="post")
if (!empty($_POST)) :

  if (empty($_POST['name'])) :
    $errors[] = "Please enter the survey name.";
    $field_errors[] = 'name';
  endif;
  
  //Including this partial will validate the date fields for start_date and end_date. It will set the values of $start_date and $end_date
  include "partials/date_validation.php";

  //If there are no validation errors attempt to create the survey
  if (empty($errors)) :
    update_survey($survey['id'], $survey_name, $start_date, $end_date);
    set_message("success", "Survey has been updated.");
    header('Location: index.php');
    die;
  endif;
endif; //End the if statement to deal with form processing

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
        <input type="text" name="name" <?php echo check_field_errors('name', $field_errors); ?> value="<?php echo $survey_name ?>">
        
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

        <br/>
        <?php echo create_hidden_survey_id_field($survey['id']); ?>

        <input type="submit" value="Update" class="button">
      </form>
    </div>
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>