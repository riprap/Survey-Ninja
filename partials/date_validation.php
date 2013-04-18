<?php
/*
    File Name: date_validation.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains the logic to validate start and end dates
*/  


$start_day = $_POST['start_day'];
$start_day = str_pad($start_day, 2, "0", STR_PAD_LEFT);
$start_month = $_POST['start_month'];
$start_month = str_pad($start_month, 2, "0", STR_PAD_LEFT);
$start_year = $_POST['start_year'];

$end_day = $_POST['end_day'];
$end_day = str_pad($end_day, 2, "0", STR_PAD_LEFT);
$end_month = $_POST['end_month'];
$end_month = str_pad($end_month, 2, "0", STR_PAD_LEFT);
$end_year = $_POST['end_year'];

//Call Function to see if there is a survey with this name already
// Check if it is a valid start_date
$start_date = format_db_date($start_day, $start_month, $start_year);
if (!$start_date) :
  $errors[] = 'Invalid Start Date';
endif;      

// Check if it is a valid end_date
$end_date = format_db_date($end_day, $end_month, $end_year);
if (!$end_date) :
  $errors[] = 'Invalid End Date';
endif;  

//Check if the end date is before the start date
if ($start_date > $end_date) :
  $errors[] = 'Start Date cannot be after End Date';
endif;
