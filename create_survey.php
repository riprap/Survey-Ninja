<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the sitee which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "Create Survey";
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
  
  $start_day = $_POST['start_day'];
  $start_month = $_POST['start_month'];
  $start_time = $_POST['start_time'];
  $start_year = 2013;

  $end_day = $_POST['end_day'];
  $end_month = $_POST['end_month'];
  $end_time = $_POST['end_time'];
  $end_year = 2013;

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

  //If there are no validation errors attempt to create the survey
  if (empty($errors)) {
    //Survey type is the first value of the index passed to use from the select
    $survey_type = $_POST['survey_type'][0];
    $name = $_POST['name'];
    //No survey with this name exists yet. Create survey
    //Format the start_date 
    add_survey($name, $survey_type, 12, $start_date, $end_date);
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
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>

          <select name="start_day">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>  
          <select name="start_time" id="time">
            <option value="5:00 AM">5:00 AM</option>
            <option value="5:15 AM">5:15 AM</option>
            <option value="5:30 AM">5:30 AM</option>
            <option value="5:45 AM">5:45 AM</option>
            
            <option value="6:00 AM">6:00 AM</option>
            <option value="6:15 AM">6:15 AM</option>
            <option value="6:30 AM">6:30 AM</option>
            <option value="6:45 AM">6:45 AM</option>
            
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:15 AM">7:15 AM</option>
            <option value="7:30 AM">7:30 AM</option>
            <option value="7:45 AM">7:45 AM</option>
            
            <option value="8:00 AM">8:00 AM</option>
            <option value="8:15 AM">8:15 AM</option>
            <option value="8:30 AM">8:30 AM</option>
            <option value="8:45 AM">8:45 AM</option>
            
            <option value="9:00 AM">9:00 AM</option>
            <option value="9:15 AM">9:15 AM</option>
            <option value="9:30 AM">9:30 AM</option>
            <option value="9:45 AM">9:45 AM</option>
            
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:15 AM">10:15 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="10:45 AM">10:45 AM</option>
            
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:15 AM">11:15 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="11:45 AM">11:45 AM</option>
            
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:15 PM">12:15 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="12:45 PM">12:45 PM</option>
            
            <option value="1:00 PM">1:00 PM</option>
            <option value="1:15 PM">1:15 PM</option>
            <option value="1:30 PM">1:30 PM</option>
            <option value="1:45 PM">1:45 PM</option>
            
            <option value="2:00 PM">2:00 PM</option>
            <option value="2:15 PM">2:15 PM</option>
            <option value="2:30 PM">2:30 PM</option>
            <option value="2:45 PM">2:45 PM</option>
            
            <option value="3:00 PM">3:00 PM</option>
            <option value="3:15 PM">3:15 PM</option>
            <option value="3:30 PM">3:30 PM</option>
            <option value="3:45 PM">3:45 PM</option>
            
            <option value="4:00 PM">4:00 PM</option>
            <option value="4:15 PM">4:15 PM</option>
            <option value="4:30 PM">4:30 PM</option>
            <option value="4:45 PM">4:45 PM</option>
            
            <option value="5:00 PM">5:00 PM</option>
            <option value="5:15 PM">5:15 PM</option>
            <option value="5:30 PM">5:30 PM</option>
            <option value="5:45 PM">5:45 PM</option>
            
            <option value="6:00 PM">6:00 PM</option>
            <option value="6:15 PM">6:15 PM</option>
            <option value="6:30 PM">6:30 PM</option>
            <option value="6:45 PM">6:45 PM</option>
            
            <option value="7:00 PM">7:00 PM</option>
            <option value="7:15 PM">7:15 PM</option>
            <option value="7:30 PM">7:30 PM</option>
            <option value="7:45 PM">7:45 PM</option>
            
            <option value="8:00 PM">8:00 PM</option>
            <option value="8:15 PM">8:15 PM</option>
            <option value="8:30 PM">8:30 PM</option>
            <option value="8:45 PM">8:45 PM</option>
            
            <option value="9:00 PM">9:00 PM</option>
            <option value="9:15 PM">9:15 PM</option>
            <option value="9:30 PM">9:30 PM</option>
            <option value="9:45 PM">9:45 PM</option>
            
            <option value="10:00 PM">10:00 PM</option>
            <option value="10:15 PM">10:15 PM</option>
            <option value="10:30 PM">10:30 PM</option>
            <option value="10:45 PM">10:45 PM</option>
            
            <option value="11:00 PM">11:00 PM</option>
            <option value="11:15 PM">11:15 PM</option>
            <option value="11:30 PM">11:30 PM</option>
            <option value="11:45 PM">11:45 PM</option>
          </select>          
        </label>      
      </p>

      <p>
        <label>
          End Date:<br/>
          <select name="end_month">
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>

          <select name="end_day">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select> 
          <select name="end_time" id="time">
            <option value="5:00 AM">5:00 AM</option>
            <option value="5:15 AM">5:15 AM</option>
            <option value="5:30 AM">5:30 AM</option>
            <option value="5:45 AM">5:45 AM</option>
            
            <option value="6:00 AM">6:00 AM</option>
            <option value="6:15 AM">6:15 AM</option>
            <option value="6:30 AM">6:30 AM</option>
            <option value="6:45 AM">6:45 AM</option>
            
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:15 AM">7:15 AM</option>
            <option value="7:30 AM">7:30 AM</option>
            <option value="7:45 AM">7:45 AM</option>
            
            <option value="8:00 AM">8:00 AM</option>
            <option value="8:15 AM">8:15 AM</option>
            <option value="8:30 AM">8:30 AM</option>
            <option value="8:45 AM">8:45 AM</option>
            
            <option value="9:00 AM">9:00 AM</option>
            <option value="9:15 AM">9:15 AM</option>
            <option value="9:30 AM">9:30 AM</option>
            <option value="9:45 AM">9:45 AM</option>
            
            <option value="10:00 AM">10:00 AM</option>
            <option value="10:15 AM">10:15 AM</option>
            <option value="10:30 AM">10:30 AM</option>
            <option value="10:45 AM">10:45 AM</option>
            
            <option value="11:00 AM">11:00 AM</option>
            <option value="11:15 AM">11:15 AM</option>
            <option value="11:30 AM">11:30 AM</option>
            <option value="11:45 AM">11:45 AM</option>
            
            <option value="12:00 PM">12:00 PM</option>
            <option value="12:15 PM">12:15 PM</option>
            <option value="12:30 PM">12:30 PM</option>
            <option value="12:45 PM">12:45 PM</option>
            
            <option value="1:00 PM">1:00 PM</option>
            <option value="1:15 PM">1:15 PM</option>
            <option value="1:30 PM">1:30 PM</option>
            <option value="1:45 PM">1:45 PM</option>
            
            <option value="2:00 PM">2:00 PM</option>
            <option value="2:15 PM">2:15 PM</option>
            <option value="2:30 PM">2:30 PM</option>
            <option value="2:45 PM">2:45 PM</option>
            
            <option value="3:00 PM">3:00 PM</option>
            <option value="3:15 PM">3:15 PM</option>
            <option value="3:30 PM">3:30 PM</option>
            <option value="3:45 PM">3:45 PM</option>
            
            <option value="4:00 PM">4:00 PM</option>
            <option value="4:15 PM">4:15 PM</option>
            <option value="4:30 PM">4:30 PM</option>
            <option value="4:45 PM">4:45 PM</option>
            
            <option value="5:00 PM">5:00 PM</option>
            <option value="5:15 PM">5:15 PM</option>
            <option value="5:30 PM">5:30 PM</option>
            <option value="5:45 PM">5:45 PM</option>
            
            <option value="6:00 PM">6:00 PM</option>
            <option value="6:15 PM">6:15 PM</option>
            <option value="6:30 PM">6:30 PM</option>
            <option value="6:45 PM">6:45 PM</option>
            
            <option value="7:00 PM">7:00 PM</option>
            <option value="7:15 PM">7:15 PM</option>
            <option value="7:30 PM">7:30 PM</option>
            <option value="7:45 PM">7:45 PM</option>
            
            <option value="8:00 PM">8:00 PM</option>
            <option value="8:15 PM">8:15 PM</option>
            <option value="8:30 PM">8:30 PM</option>
            <option value="8:45 PM">8:45 PM</option>
            
            <option value="9:00 PM">9:00 PM</option>
            <option value="9:15 PM">9:15 PM</option>
            <option value="9:30 PM">9:30 PM</option>
            <option value="9:45 PM">9:45 PM</option>
            
            <option value="10:00 PM">10:00 PM</option>
            <option value="10:15 PM">10:15 PM</option>
            <option value="10:30 PM">10:30 PM</option>
            <option value="10:45 PM">10:45 PM</option>
            
            <option value="11:00 PM">11:00 PM</option>
            <option value="11:15 PM">11:15 PM</option>
            <option value="11:30 PM">11:30 PM</option>
            <option value="11:45 PM">11:45 PM</option>
          </select>                     
        </label> 
      </p>

      <p>
        <label>
          Survey type:<br/>
           <select name="survey_type[]">
               <option value="1">Multiple Choice</option>
               <option value="2">Agree or Disagree</option>
           </select>
        </label>
      </p>

      <input type="submit" value="Create"/>
    </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>