<!DOCTYPE html>
<!--
    File Name: create_survey.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that allows a user to create a new instance of a survey.
-->

<?php 
$page_name = "Create Survey";
include "functions/functions.php";
include 'partials/html_header.php'; 
$logged_in_profile = get_login();

$name = '';
$start_date = '';
$end_date = '';

$errors = array();

// if the user submitted the form (with method="post")
if (!empty($_POST)) {

  if (empty($_POST['name'])) {
    $errors[] = "Please enter the survey name.";
  }
  
  $start_day = $_POST['start_day'];
  $start_month = $_POST['start_month'];
  //$start_time = $_POST['start_time'];
  $start_year = $_POST['start_year'];

  $end_day = $_POST['end_day'];
  $end_month = $_POST['end_month'];
  //$end_time = $_POST['end_time'];
  $end_year = $_POST['end_year'];

  $question_count = $_POST['question_count'][0];

  //Survey type is the first value of the index passed to use from the select
  $survey_type = $_POST['survey_type'][0];
  $name = $_POST['name'];

  //Call Function to see if there is a survey with this name already
  // Check if it is a valid start_date
  $start_date = format_db_date($start_day, $start_month, $start_year);
  if (!$start_date) {
    $errors[] = 'Invalid Start Date';
  }      

  // Check if it is a valid end_date
  $end_date = format_db_date($end_day, $end_month, $end_year);
  if (!$end_date) {
    $errors[] = 'Invalid End Date';
  }   

  //Check if the end date is before the start date
  if ($start_date > $end_date) {
    $errors[] = 'Start Date cannot be after End Date';
  }

  //If there are no validation errors attempt to create the survey
  if (empty($errors)) {
    //No survey with this name exists yet. Create survey
    //Format the start_date 
    add_survey($name, $survey_type, $logged_in_profile['id'], $start_date, $end_date, $question_count);
    set_message("success", "Survey has been created");
  }
  //There is an error on the page. Maintain sticky variables.
  else {   
    $name = $_POST['name'];
  }
}

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

    <h1>
      <? echo $page_name;?>
    </h1>

    <div id="errors">
      <?php
        //Loop over each error in the erros array and print any errors that exist. 
        foreach ($errors as $error) {
          echo "<p>$error</p>";
        }
      ?>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

      <p>
        <label>
          Survey Name:<br/>
          <input type="text" name="name" value="<?php echo $name ?>"/>
        </label>
      </p>

      <p>
        <label>
          Start Date:<br/>
          <select name="start_month">
            <?php 
              if (isset($start_month)) {
                echo create_month_dropdown($start_month);
              }
            ?>    
          </select>

          <select name="start_day">
            <?php  
              if (isset($start_day)) {
                echo create_day_dropdown($start_day); 
              }  
            ?> 
          </select>  

          <select name="start_year" id="year">
            <?php 
              if (isset($start_year)) {
                echo create_year_dropdown($start_year); 
              }
            ?>
          </select>                     
        </label>      
      </p>

      <p>
        <label>
          End Date:<br/>
          <select name="end_month">
            <?php 
              if (isset($end_month)) {
                echo create_month_dropdown($end_month);
              }
            ?>            
          </select>

          <select name="end_day">
            <?php  
              if (isset($end_day)) {
                echo create_day_dropdown($end_day); 
              }  
            ?>          
          </select> 
          <select name="end_year" id="year">
            <?php 
              if (isset($end_year)) {
                echo create_year_dropdown($end_year); 
              }
            ?>
          </select>                               
        </label> 
      </p>

      <p>
        <label>
          Survey type:<br/>
           <?php include 'partials/selects/select_survey_type.php'; ?>
        </label>
      </p>
      <p>
        Number of Questions:<br/>
         <select name="question_count[]">
            <?php include 'partials/select_day.php'; ?>
         </select>        
      </p>

      <input type="submit" value="Create"/>
    </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>