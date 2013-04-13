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

$name = '';
$start_date = '';
$end_date = '';
$survey_type = '';
$errors = array();

// if the user submitted the form (with method="post")
if (!empty($_POST)) {

  if (empty($_POST['name'])) {
    $errors[] = "Please enter the survey name.";
  }
  
  //If there are no validation errors attempt to create the survey
  if (empty($errors)) {
    //Survey type is the first value of the index passed to use from the select
    $survey_type = $_POST['survey_type'][0];
    $name = $_POST['name'];
    //Call Function to see if there is a survey with this name already
      //No survey with this name exists yet. Creaate survey
    add_survey($name, $survey_type, 12);
  }
  //There is an error on the page. Maintain sticky variables.
  else {   
    $name = $_POST['name'];
  }
}

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

    <?php
      //Loop over each error in the erros array and print any errors that exist. 
      foreach ($errors as $error) {
        echo "<p>$error</p>";
      }
    ?>

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
          <input type="text" name="start_date" value="<?php echo $start_date ?>"/>
        </label>
      </p>

      <p>
        <label>
          End Date:<br/>
          <input type="text" name="end_date" value="<?php echo $end_date ?>"/>
        </label>
      </p>

      <p>
        <label>
          Survey type:<br/>
           <select name="survey_type[]">
               <option value="multiple_choice">Multiple Choice</option>
               <option value="agree_or_disagree">Agree or Disagree</option>
           </select>
        </label>
      </p>

      <input type="submit" value="Create"/>
    </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>