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
  global $db;  
  $query = "
    INSERT INTO question_answers
    ( question_id, text, date_created, date_updated)
    VALUES
    ( ?, ?, NOW(), NOW())
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($question_id, $text));
}

//Add a submission for a survey to the database 
function add_submission($survey_id, $ip = NULL) {
  global $db; 
  $query = "
    INSERT INTO submissions
    (survey_id, ip_address, date_created, date_updated)
    VALUES
    ( ?, ?, NOW(), NOW())
  ";  
  $stmt = $db->prepare($query);
  $stmt->execute(array($survey_id, $ip));
  
  //Get the value of the row we just inserted.
  $id = $db->lastInsertId();
  return $id; 
}

/*
Save a question related to a survey 
@param survey_id The id of the related survey 
@param question The question 
@param type The type of question
*/
function add_question($survey_id, $question, $type) {
  global $db;
  $query ="
    INSERT INTO questions
    ( survey_id, text, type, date_created, date_updated)
    VALUES
    ( ?, ?, ?, NOW(), NOW())
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($survey_id,
                       $question, 
                       $type));
  
  //Get the value of the row we just inserted.
  $id = $db->lastInsertId();
  return $id; 
}

/*
Save a users answer to a particular question
@param question_id The id of the corresponding question
@param answer = The text for the answer
@param user_id The id of the user
*/
function add_submission_answer($survey_id, $question_id, $answer, $submission_id) {
  global $db;
  $query = "
    INSERT INTO submissions_answers
    ( survey_id, question_id, submission_id, question_answer_id, date_created, date_updated)
    VALUES
    ( ?, ?, ?, ?, NOW(), NOW())
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($survey_id, 
                       $question_id, 
                       $submission_id, 
                       $answer));
}

/* 
Add a survey to the database 
@param name The name of the survey
@param type The type of survey
@param creator The creator of the survey
@param start_date The date to start the survey
@param end_date The date to end the survey
@param question_count The number of questions in the survey
*/
function add_survey($name, $type, $creator, $start_date = NULL, $end_date = NULL, $question_count) {
  global $db;
  $query = "
    INSERT INTO surveys
    ( name, creator_id, type_id, date_created, date_updated, start_date, end_date, question_count)
    VALUES
    ( ?, ?, ?, NOW(), NOW(), ?, ?, ?)
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($name, 
                       $creator, 
                       $type, 
                       $start_date,
					   $end_date,
					   $question_count));
  //Get the value of the row we just inserted.
  return $db->lastInsertId();
}

/*
Check if a survey is open or closed 
@param survey_id The id of the survey to find the details for
@return Whether the survey is open (true) or closed (false)
*/
function check_survey_status($survey_id) {
  //Select start_date, end_date from surveys where id = survey_id 
}

function get_answers($question_id) {
  global $db;
  $query = "
    SELECT * FROM question_answers
    WHERE question_id = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($question_id));
  $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);	
  
  return $answers;
}

//get the number of people that have chosen a specific answer
function get_answer_count($answer_id) {
  global $db;
  $query = "
  SELECT COUNT(*) 
  FROM submissions_answers WHERE `question_answer_id` = ?
  ";  
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($answer_id));
  $row = $stmt->fetch();
  //returns count(*)
  return $row[0];
}

function get_questions($survey_id) {
  global $db;
  $query = "
    SELECT * FROM questions
    WHERE survey_id = ?
  ";  
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($survey_id));  

  $questions = array();
  
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $questions[] = $row;
  }
  return $questions;
}

function get_submission_count($survey_id) {
  global $db;
  $query = "
    SELECT COUNT(*) FROM submissions
    WHERE survey_id = ?
  ";  
   
  $stmt = $db->prepare($query);
  $stmt->execute(array($survey_id));
  //returns first row
  $row = $stmt->fetch();
  return $row[0];
}

/*
Get all of the details for a survey so that it can be displayed to a user
@param survey_id The id of the survey to show the user
@return Survey Object, Question Object, Answers Object
*/
function get_survey($survey_id) {
  global $db;
  $query = "
    SELECT surveys.*, survey_types.name AS survey_type
    FROM surveys
    LEFT JOIN survey_types ON survey_types.id = surveys.type_id
    WHERE surveys.id = ?
  ";

  $stmt = $db->prepare($query);
  $stmt->execute(array($survey_id));
  $survey = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $survey[0];
}

//get the types of surveys that can be created
function get_survey_types() {
  global $db;
  $query = "
    SELECT *
    FROM survey_types
  ";
  
  $stmt = $db->query($query);
  $types = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $types[] = $row;
  }
  return $types;
}

/*
Get all of the surveys that are created by the specifed user
@param user_id The user we are getting the surveys for 
@return All of the surveys created by the user
*/
function get_user_surveys($user_id) {
  global $db;
  $query = "
    SELECT surveys.*, survey_types.name AS survey_type
    FROM surveys
    LEFT JOIN survey_types ON survey_types.id = surveys.type_id
    WHERE creator_id = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($user_id));
  
  $surveys = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $surveys[] = $row;
  }
  return $surveys;
}


/*
Get all of the surveys that are created by the specifed user
@param user_id The user we are getting the surveys for 
@return All of the surveys created by the user
*/
function get_active_surveys() {
  global $db;
  $query = "
   SELECT DISTINCT (questions.survey_id), surveys.*, survey_types.name AS survey_type
   FROM questions
   JOIN surveys ON surveys.id = questions.survey_id
   LEFT JOIN survey_types ON survey_types.id = surveys.type_id

  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute();
  
  $surveys = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $surveys[] = $row;
  }
  return $surveys;
}
