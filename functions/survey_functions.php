<?php
/*
    File Name: survey_functions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the functions relating to suveys of the site
*/

/** 
* Save the potential answer to a specific question
*
* @param question_id The id of the corresponding question
* @param answer The answer to the question
*
**/
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

/**
* Add a submission to the database.
*
* @param survey_id The survey we are adding a submission for.
* @param ip The ip address that the submission is being created from.
*
**/
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

/**
* Save a question related to a survey 
*
* @param survey_id The id of the related survey 
* @param question The question 
* @param type The type of question
* @return id The id of the question that has been created
*
**/
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

/**
* Save a users answer to a particular question
*
* @param question_id The id of the corresponding question
* @param answer = The text for the answer
* @param user_id The id of the user
*
**/
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

/** 
* Add a survey to the database 
* 
* @param name The name of the survey
* @param type The type of survey
* @param creator The creator of the survey
* @param start_date The date to start the survey
* @param end_date The date to end the survey
* @param question_count The number of questions in the survey
* @return The id of the survey has been created
*
**/
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

/**
* Check if a survey is open or closed 
*
* @param start_date The start date of the survey
* @param end_date The end date of the survey
* @return Whether the survey is open (true) or closed (false)
*
**/
function survey_status($start_date, $end_date) {
  $start_date = strtotime($start_date);
  $end_date = strtotime($end_date);
  $now = strtotime(date('Y-m-d h:i:s'));  

  if ($end_date < $now || $start_date > $now) :
    return false;
  else :
    return true;
  endif;
}

/**
* Get all of the answers associated with a question
* 
* @param question_id The id of the question we are getting the answers for
* @return answers An array of al the answers associated with the current questions
*
**/
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


/**
* Get the number of people that have chosen a particular answer
* 
* @param answer_id The answer we are getting the count for 
* @return The count of people that have selected that answer.
*
**/
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

/**
* Get all of the questions associated with a question
* 
* @param survey_id The id of the survey to get the questions for 
* @return questions An array of all the questions associated with the specified survey
*
**/
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

/**
* Get the number of submissions for a specific survey
* 
* @param survey_id The id of the survey to get the submissions for
* @return int The number of submissions
*
**/
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

/**
* Get all of the details for the specified survey
* 
* @param survey_id The survey we are getting the information for. 
* @return An array of the details for the survey.
*
**/
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

/**
* Get all of the types of surveys that can be created. 
* 
* @return An array of the types of surveys that can be created.
*
**/
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
/**
* Get all of the surveys that a user has created
* 
* @param user_id The user id we are getting the surveys for 
* @return An array of the surveys the user has created.
*
**/
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


/**
* Get all of the surveys that are currently active and have questions associated with them 
* 
* @return An array of all the active surveys with questions
*
**/
function get_active_surveys() {
  global $db;
  $query = "
   SELECT DISTINCT (questions.survey_id), surveys.*, survey_types.name AS survey_type
   FROM questions
   JOIN surveys ON surveys.id = questions.survey_id
   LEFT JOIN survey_types ON survey_types.id = surveys.type_id
   WHERE (NOW() > DATE(start_date) AND NOW() < DATE(end_date))
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute();
  
  $surveys = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $surveys[] = $row;
  }
  return $surveys;
}

/**
 * Update the details for a survey
 *
 * @param id The id of the survey to update
 * @param name Updated version of the name
 * @param start_date Updated version of start_date
 * @param end_date Updated version of end_date
 * @author Scott Montgomery
 **/
function update_survey($id, $name, $start_date, $end_date){
  global $db;
  $query = "
    UPDATE surveys 
    SET name = ?, start_date = ?, end_date = ?, date_updated = NOW()
    WHERE id = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($name, $start_date, $end_date, $id));
}
