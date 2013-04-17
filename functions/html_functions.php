<?php
/*
    File Name: html_functions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the html php functions that are used throughout the site.
*/

function agree_disagree_buttons($question_id) {
  $button_html = '<input type="radio" name="question_'.$question_id.'" value="agree">Agree<br>';                  
  $button_html .= '<input type="radio" name="question_'.$question_id.'" value="disagree">Disagree<br>';  
  return $button_html;  
}

function check_field_errors($fieldname, $error_list) {
  $html = "";
  if (in_array($fieldname, $error_list)) {
    $html = "class='error'";
  }
  return $html;
}

function create_day_dropdown($day) {  
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

function create_hidden_survey_id_field($id) {
  return "<input type=\"hidden\" name=\"survey\" value='$id' />";
}

function create_month_dropdown($month){
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

function create_question($number, $question, $errors = null) {
  $class_html = check_field_errors("question_". $number, $errors);
  $question_html = "Question #". $number ."<br/>\n"; 
  $question_html .= '<input type="text" name="question_'.$number.'" value="'.$question.'"'.$class_html.'/>';
  return $question_html;
}


function create_survey_type_dropdown($value) {  
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

function create_year_dropdown($year) {
  $optionsList = '';    
  for( $i = date("Y"); $i <= date("Y") + 5; $i++){
    $selected = '';
    if ($i == $year) {
      $selected = 'selected="selected"';
    }
    $optionsList .= "<option value='$i' $selected >$i</option>\n"; 
  } 
  return $optionsList;    
}



function format_date($date_string) {
  return date('F d, Y', strtotime($date_string));
}











