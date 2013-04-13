<?php
/*
    File Name: userfunctions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the functions relating to users of the site.
*/

/* 
Add a user to the database 
@param name The users name
@param email The users email address
@param password The users password
*/

function add_user($name, $email, $password) {
  $name = mysql_real_escape_string($name);
  $email = mysql_real_escape_string($email);
  $password = mysql_real_escape_string($password);

  mysql_query("
    INSERT INTO user_database
    ( name, email, password)
    VALUES
    ( '$name', '$email', '$password')
  ") ;
  
  $_SESSION['email'] = $_POST['email'];

  $_SESSION['new_register'] = true;
  header('Location: index.php');
}

/* 
Check if the email address is already associated with a user in the database 
@param email The users email address
@return Whether or not the user was found in the database
*/

function check_user_exists($email){
  $check_email = mysql_real_escape_string($email);
  $check= mysql_query("SELECT * FROM users WHERE email = '$check_email'") or die(mysql_error());

  //this checks to see the number of results when the email is searched
  $occurances = mysql_num_rows($check);

  if (empty($occurances)) {
    $user_exists = false;
  } 
  else {
    $user_exists = true;
  }
  return $user_exists;
}

/* 
Check if the password given corresponds with an email address
@param password The supplied password
@param email The supplied email address
@return Whether or not the password matches the one in the database
*/

function check_password_correct($email, $password){
  $check_email = mysql_real_escape_string($email);
  $check_password = mysql_real_escape_string($password);
  $correct = false;
  $check= mysql_query("SELECT * FROM users WHERE email = '$check_email'") or die(mysql_error());

  while($info = mysql_fetch_array($check))
  {
    if ($check_password == $info['password']) {
      $correct = true;
    }
  }

  return $correct;
}

/*
Check if the user is logged in. 
If not they are redirected to the login page and prompted to login.
*/
function get_login(){
  if (empty($_SESSION['email'])) { 
    header('Location: login.php');
    die;
  }
}