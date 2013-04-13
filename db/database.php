<?php
/*
    File Name: database.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file connects to the database.
*/
@mysql_connect('localhost', 'root', '')
  or die('Unable to connect to database');

@mysql_select_db('survey')
  or die('Unable to select database Survey')
;

/*
    File Name: database.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file connects to the database.
*/
/*
//enter database stuff here
$host = "localhost";
$database = "survey";
$dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=UTF-8';
$username = "sn";
$password = "password";

try{
$db = new PDO($dsn, $username, $password);
}
catch (Exception $e){
	exit($e);
}
*/
?>
