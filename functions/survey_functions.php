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

function add_user_answer($question_id, $answer, $user_id) {
//Insert into user_answers question_id = @question_id, answer = @answer, @user = user_id 
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

function add_survey($name, $type, $creator) {
  $name = mysql_real_escape_string($name);
  $type = mysql_real_escape_string($type);
  $creator = mysql_real_escape_string($creator);

  mysql_query("
    INSERT INTO surveys
    ( name, creator_id, survey_type, date_created, date_updated)
    VALUES
    ( '$name', '$creator', '$type', NOW(), NOW())
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
    SELECT * FROM surveys
    WHERE id = '$survey_id'
  ");

  $row = mysql_fetch_array($query);

  return $row;  
}

