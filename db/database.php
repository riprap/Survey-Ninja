<?php
/*
    File Name: db/database.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file connects to the database, creating a PDO.                    
*/

$host = "localhost";
$database = "survey";
$dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=UTF-8';
$username = "root";
$password = "";

try{
  $db = new PDO($dsn, $username, $password);
  //set error mode to most similar to mysql errors
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch (Exception $e){
  exit($e);
}
?>
