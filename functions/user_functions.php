<?php
/*
    File Name: userfunctions.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file contains all of the functions relating to users of the site.
*/

/**
 * Add a user to the database 
 * 
 * @param name The name of the user to add
 * @param email The users email address
 * @param password The users password
 * @author Scott Montgomery
 **/
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
  
  $_SESSION['id'] = $db->lastInsertId();

  set_message("Success", "Thank you for registering.");
}

/**
 * Check if the email address is already associated with a user in the database  
 * 
 * @param email The users email address
 * @return boolean If the email address was found in the database
 * @author Scott Montgomery
 **/
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

/**
 * Check if the password given corresponds with an email address
 * 
 * @param password The supplied password
 * @param email The supplied email address
 * @return boolean Whether or not the password matches the one in the database
 * @author Scott Montgomery
 **/
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
  	return $user['id'];
  }
  return false;
}

/**
 * Get the details for the supplied user
 * 
 * @param id The supplied user id
 * @return array An array of the users details
 * @author Scott Montgomery
 **/
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

/**
 * Check if a user is logged in
 * 
 * @return boolean If a user is logged in or not
 * @author Scott Montgomery
 **/
function is_logged_in(){
  if (empty($_SESSION['id'])) { 
    return false;
  }
  else{
  	return true;
  }
}

/**
 * Encrypt a password using salt and pepper
 *
 * @param password The password to encrypt 
 * @return string The encrypted version of the password
 * @author Scott Montgomery
 **/
function secure_password($password){
	$salt = sha1("facebook");
	$pepper = sha1("twitter");
	$secured_password = $salt . sha1($password) . $pepper;
	return $secured_password;
}

/**
 * Update the details for a user
 *
 * @param id The id of the user to update the details for
 * @param name The updated version of the users name
 * @param email The updated version of the users emails
 * @author Scott Montgomery
 **/
function update_user($id, $name, $email){
	global $db;
  $query = "
    UPDATE users 
    SET name = ?, email = ?
    WHERE id = ?
  ";
	
  $stmt = $db->prepare($query);
  $stmt->execute(array($name, $email, $id));
}
