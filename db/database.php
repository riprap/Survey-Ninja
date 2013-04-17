<?php
/*
    File Name: database.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file connects to the database, 
                      creating a PDO.
*/

$host = "localhost";
$database = "survey";
$dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=UTF-8';
$username = "root";
$password = "";

try{
	$db = new PDO($dsn, $username, $password);
}
catch (Exception $e){
	exit($e);
}
?>
