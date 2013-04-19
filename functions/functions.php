<?php
/*
    File Name: functions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the php functions that are used throughout the site.
*/

session_start();

//Initialize the error arrays
$errors = array();
$field_errors = array();

//Initialize the default timezone
date_default_timezone_set('America/New_York');

//Include the database connection file
require "db/database.php";
//Include the file with all of the functions relating to surveys
include "survey_functions.php";
//Include the file with all of the functions relating to users
include "user_functions.php";
//Include the file with all of the functions relating to generating HTML
include "html_functions.php";
//Include the locales file which contains all of the appropriate text variables
include "locales/en.php";

//Array of pages that require the user to be logged in
$require_login_pages = array("My Profile", "Add Questions to Survey", "Create Survey", "Edit Profile", "Edit Survey", "My Surveys", "My Profile", "Email Survey", "Email Results");

//Check if the current page is one that requires a login
if (in_array($page_name, $require_login_pages)) :
  //Make sure the user is logged in by including the get login partial
  include 'partials/get_login.php'; 
endif;


/**
 * Create a date so that it can be inserted into the database
 * 
 * @param $day The day 
 * @param $month The month
 * @param $year The year
 * @return The formatted date 
 * @author Scott Montgomery
 **/
function format_db_date($day, $month, $year) {
  $date = $year . '-' . $month . '-' . $day;
  return checkdate($month, $day, $year) ? "$year-$month-$day" : false;
}

/**
 * Get the values of the curent date
 * 
 * @return An array with the current day, year and month
 * @author Scott Montgomery
 **/
function get_current_date() {
  $year = date("Y");
  $month = date("m");
  $day = date("d");
  return array($day, $month, $year);
}

/**
 * Break apart a date into indvidual parts
 * 
 * @param date The date to break apart
 * @return An array with the day month and year
 * @author Scott Montgomery
 **/
function get_date_params($date) {
  $day = date("d",strtotime($date)); 
  $month = date("m",strtotime($date));
  $year = date("y",strtotime($date));
  return array($day, $month, $year);
}

/**
 * Get all of the messages that are stored in the session
 * 
 * @return An array with all messages
 * @author Scott Montgomery
 **/
function get_messages() {
    $messages_array = array();
    if (isset($_SESSION['messages'])) :
        $messages_array = $_SESSION['messages'];
        unset($_SESSION['messages']);        
    endif;
    return $messages_array;
}

/**
 * Get the values of the tomorrows date
 * 
 * @return An array with tomorrows day, year and month
 * @author Scott Montgomery
 **/
function get_tomorrow_date() {
  $tommorow = mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y")); 
  $year = date("Y", $tommorow);;
  $month = date("m", $tommorow);
  $day = date("d", $tommorow);
  return array($day, $month, $year);
}

/**
 * Add a message to the session variable
 * 
 * @param message_type The type of message we are creating
 * @param The message to add to the session variable
 * @author Scott Montgomery
 **/
function set_message($message_type, $message) {
  $_SESSION['messages'][$message_type][] = $message;
}

