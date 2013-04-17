<?php
/*
    File Name: functions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the php functions that are used throughout the site.
*/

session_start();

//Include the database connection file
require "db/database.php";
//Include the file with all of the functions relating to surveys
include "survey_functions.php";
//Include the file with all of the functions relating to users
include "user_functions.php";
//Include the locales file which contains all of the appropriate text variables
include "locales/en.php";


function format_db_date($day, $month, $year) {
  $date = $year . '-' . $month . '-' . $day;
  return checkdate($month, $day, $year) ? "$year-$month-$day" : false;
}

function get_messages() {
    $messages_array = array();
    if (isset($_SESSION['messages'])) {
        $messages_array = $_SESSION['messages'];
        unset($_SESSION['messages']);        
    }
    return $messages_array;
}

function set_message($message_type, $message) {
    $_SESSION['messages'][$message_type][] = $message;
}

$user_id = 12;

$_SESSION['id'] = 1;

date_default_timezone_set('America/Los_Angeles');

function create_year_dropdown($selected_year = null) {
  $optionsList = '';    
  for( $i = date("Y"); $i <= date("Y") + 5; $i++){
    $selected = '';
    if ($i == $selected_year) {
      $selected = 'selected="selected"';
    }
    $optionsList .= "<option value='$i' $selected >$i</option>\n"; 
  } 
  return $optionsList;    
}

function create_month_dropdown($month= null){
  $optionsList = '';    
  for( $i = 1; $i <= 12; $i++){
    $selected = '';
    if ($i == $month) {
      $selected = 'selected="selected"';
    }
    $monthName = date("F", mktime(0, 0, 0, $i, 10));
    $optionsList .= "<option value='$i' $selected >$monthName</option>\n"; 
  } 
  return $optionsList;     
}

function create_day_dropdown($day= null) {  
  $optionsList = '';    
  for ($i=1; $i < 31; $i++){
    $selected = '';
    if ($i == $day) {
      $selected = 'selected="selected"';
    }

    $optionsList .= "<option value='$i' $selected >$i</option>\n"; 
  } 
  return $optionsList;      
}



function create_survey_type_dropdown($value = null) {  
  $optionsList = ''; 
  $types = get_survey_types();   
  foreach ($types as $type){
    $selected = '';
    $id = $type['id'];
    $name = $type['name'];

    if ($id == $value) {
      $selected = 'selected="selected"';
    }

    $optionsList .= "<option value='$id' $selected >$name</option>\n"; 

  } 
  return $optionsList;      
}

function format_date($date_string) {
  return date('F d, Y', strtotime($date_string));
}

function create_question($number, $question) {
  $question_html = "Question #". $number ."<br/>\n"; 
  $question_html .= '<input type="text" name="question_'.$number.'" value="'.$question.'"/>';
  return $question_html;
}



function create_hidden_servey_id_field($id) {
  return "<input type=\"hidden\" name=\"survey\" value='$id' />";
}


function agree_disagree_buttons($question_id) {
  $button_html = '<input type="radio" name="question_'.$question_id.'" value="agree">Agree<br>';                  
  $button_html .= '<input type="radio" name="question_'.$question_id.'" value="disagree">Disagree<br>';  
  return $button_html;  
             

}