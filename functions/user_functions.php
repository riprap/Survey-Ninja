<?php
/*
    File Name: userfunctions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the 
                      functions relating to users of 
                      the site.
*/

/* 
Add a user to the database 
@param name The users name
@param email The users email address
@param password The users password
*/
function add_user($name, $email, $password) {
  global $db;
  $query = "
    INSERT INTO users
    ( name, email, password)
    VALUES
    ( ?, ?, ?)
  ";
  
  $password = secure_password($password);
  $stmt = $db->prepare($query);
  $stmt->execute(array($name, $email, $password));
  
  
  $_SESSION['email'] = $email;

  set_message("Success", "Thank you for registering.");
}

/* 
Check if the email address is already associated with a user in the database 
@param email The users email address
@return boolean Whether or not the user was found in the database
*/
function check_user_exists($email){
  global $db;
  $query = "
  SELECT * FROM users 
  WHERE email = ?";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($email));
  
  //how many users with that e-mail?
  $occurances = $stmt->rowCount();

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
@return boolean Whether or not the password matches the one in the database
*/
function check_password_correct($email, $password){
  global $db;
  $query = "
  SELECT * FROM users 
  WHERE email = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($email));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $password = secure_password($password);
  
  if ($password == $user['password']){
  	$correct = true;
  }
  else{
  	$correct = false;
  }

  return $correct;
}

/*
Check if the user is logged in. 
If not they are redirected to the login page and prompted to login.
*/
function get_login(){
  if (empty($_SESSION['id'])) { 
    header('Location: login.php');
    die;
  }
  return get_user($_SESSION['id']);
}

function get_user($id) {
  global $db;
  $query = "
    SELECT *
    FROM users
    WHERE id = ?
  ";
	
  $stmt = $db->prepare($query);
  $stmt->execute(array($id));
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function secure_password($password){
	$salt = sha1("facebook");
	$pepper = sha1("twitter");
	$secured_password = $salt . sha1($password) . $pepper;
	return $secured_password;
}