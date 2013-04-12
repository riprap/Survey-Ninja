<?php
/*
    File Name: userfunctions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the functions relating to users of the site.
*/

// This function adds a user to the database

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

// This function checks if a user already exists with the submitted email
function check_user_exists($email){
  $check_email = mysql_real_escape_string($email);
  $check= mysql_query("SELECT * FROM users WHERE email = '$check_email'") or die(mysql_error());

  //this checks to see the number of results when the email is searched
  $occurances = mysql_num_rows($check);

  if (empty($occurances)){
    $user_exists = false;
  } 
  else {
    $user_exists = true;
  }

  return $user_exists;
}

// This function checks that the entered password is correct
function check_password_correct($email,$password){
  $check_email = mysql_real_escape_string($email);
  $check_password = mysql_real_escape_string($password);
  $correct = false;
  $check= mysql_query("SELECT * FROM users WHERE email = '$check_email'") or die(mysql_error());

  while($info = mysql_fetch_array($check))
  {
    if ($check_password == $info['password']){
      $correct = true;
    }
  }

  return $correct;
}

//this function checks if the user is logged in. if not they are redirected to the login page and prompted to login
function get_login(){
  if (empty($_SESSION['email'])) {
    $_SESSION['no_login'] = true;  
    header('Location: login.php');
    die;
  }
}