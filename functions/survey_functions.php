<?php
/*
    File Name: survey_functions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the functions relating to suveys of the site
*/

/* 
Save the potential answer to a specific question
@param question_id The id of the corresponding question
@param answer The answer to the question
*/

function add_answer($question_id, $text) {
  $question_id = mysql_real_escape_string($question_id);
  $text = mysql_real_escape_string($text);

  mysql_query("
    INSERT INTO question_answers
    ( question_id, text, date_created, date_updated)
    VALUES
    ( '$question_id', '$text', NOW(), NOW())
  ") ;
}

/*
Save a users answer to a particular question
@param question_id The id of the corresponding question
@param answer = The text for the answer
@param user_id The id of the user
*/

function add_submission_answer($survey_id, $question_id, $answer, $submission_id) {
  $question_id = mysql_real_escape_string($question_id);
  $submission_id = mysql_real_escape_string($submission_id);
  $survey_id = mysql_real_escape_string($survey_id);
  $answer = mysql_real_escape_string($answer);
  mysql_query("
    INSERT INTO submissions_answers
    ( survey_id, question_id, submission_id, question_answer_id, date_created, date_updated)
    VALUES
    ( '$survey_id', '$question_id', '$submission_id', '$answer', NOW(), NOW())
  ") ;
}

/*
Save a question related to a survey 
@param survey_id The id of the related survey 
@param question The question 
@param type The type of question
*/

function add_question($survey_id, $question, $type) {
  $survey_id = mysql_real_escape_string($survey_id);
  $question = mysql_real_escape_string($question);
  $type = mysql_real_escape_string($type);

  mysql_query("
    INSERT INTO questions
    ( survey_id, text, type, date_created, date_updated)
    VALUES
    ( '$survey_id', '$question', '$type', NOW(), NOW())
  ") ;
    //Get the value of the row we just inserted.
  $id = mysql_insert_id();
  return $id;
}

/* 
Add a survey to the database 
@param name The name of the survey
@param type The type of survey
@param creator The creator of the survey
@param start_date The date to start the survey
@param end_date The date to end the survey
*/

function add_survey($name, $type, $creator, $start_date = NULL, $end_date = NULL) {
  $name = mysql_real_escape_string($name);
  $type = mysql_real_escape_string($type);
  $creator = mysql_real_escape_string($creator);
  mysql_query("
    INSERT INTO surveys
    ( name, creator_id, type_id, date_created, date_updated, start_date, end_date)
    VALUES
    ( '$name', '$creator', '$type', NOW(), NOW(), '$start_date', '$end_date')
  ") ;
  //Get the value of the row we just inserted.
  $id = mysql_insert_id();
  header('Location: add_questions.php?survey='.$id);
}

/*
Check if a survey is open or closed 
@param survey_id The id of the survey to find the details for
@return Whether the survey is open (true) or closed (false)
*/

function check_servey_status($survey_id) {
  //Select start_date, end_date from surveys where id = survey_id 
}

/*
Get all of the details for a survey so that it can be displayed to a user
@param survey_id The id of the survey to show the user
@return Survey Object, Question Object, Answers Object
*/

function get_survey($survey_id) {
// Select * from surveys where id = id 
// Select * from questions where survey_id = id
// Select * from answers where survey_id = id 
  $survey_id = mysql_real_escape_string($survey_id);
  $query = mysql_query("
    SELECT surveys.*, survey_types.name AS survey_type
    FROM surveys
    LEFT JOIN survey_types ON survey_types.id = surveys.type_id
    WHERE surveys.id = '$survey_id'
  ");

  $row = mysql_fetch_array($query);
  return $row;  
}


function get_questions($survey_id) {
  $q = mysql_query("
    SELECT * FROM questions
    WHERE survey_id = '$survey_id'
  ");

  $questions = array();

  while ($row = mysql_fetch_array($q)) {
    $questions[] = $row;
  }

  return $questions;
}

function get_answers($question_id) {
  $q = mysql_query("
    SELECT * FROM question_answers
    WHERE question_id = '$question_id'
  ");

  $answers = array();

  while ($row = mysql_fetch_array($q)) {
    $answers[] = $row;
  }

  return $answers;
}

/*
Get all of the surveys that are created by the specifed user
@param user_id The user we are getting the surveys for 
@return All of the surveys created by the user
*/
function get_user_surveys($user_id) {
  $q = mysql_query("
    SELECT surveys.*, survey_types.name AS survey_type
    FROM surveys
    LEFT JOIN survey_types ON survey_types.id = surveys.type_id
    WHERE creator_id = '$user_id'
  ");


  $surveys = array();

  while ($row = mysql_fetch_array($q)) {
    $surveys[] = $row;
  }

  return $surveys;
}


function get_submission_count($survey_id) {
  $q = mysql_query("
    SELECT COUNT(*) FROM submissions
    WHERE survey_id = '$survey_id'
  ");  
  $row = mysql_fetch_row($q);
  return $row[0];
}

//Add a submisison for a survey to the database 
function add_submission($survey_id, $ip = NULL) {
  mysql_query("
    INSERT INTO submissions
    (survey_id, ip_address, date_created, date_updated)
    VALUES
    ( '$survey_id', '$ip', NOW(), NOW())
  ") ;  
  //Get the value of the row we just inserted.
  $id = mysql_insert_id();
  return $id;  
}
