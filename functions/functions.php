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
//Include the file with all of the functions relating to generating HTML
include "html_functions.php";
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



$errors = array();
$field_errors = array();

date_default_timezone_set('America/New_York');

