<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the sitee which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "Register";
include "functions/functions.php";
include 'partials/html_header.php'; 

$email = '';
$name = '';
$password = '';
$errors = array();
$success = false;

// if the user submitted the form (with method="post")
if (!empty($_POST)) {

  if (empty($_POST['name'])) {
    $errors[] = "Please enter your name.";
  }

  // if the email field is empty
  if (empty($_POST['email'])) {
    $errors[] = "Please enter your email address.";
  }

  else if ( !preg_match('/@.+\..+/', $_POST['email']) ) {
    $errors[] = "Please enter a valid email address.";
  }

  if (empty($_POST['password'])) {
    $errors[] = "Please enter your password.";
  }

  // if there are no errors
  if (empty($errors)) {

      // this searches for the email in the database
      $exists= check_user_exists ($_POST['email']);

       if ($exists) {
          $errors[] = "That email address is already in use.";
          $name = $_POST['name'];
          $password = $_POST['password'];
        }
      else {
        add_user($_POST['name'], $_POST['email'], md5($_POST['password']));
        $success = true;
        }
    }

  else {
    // must be an error. use this in the form below
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
  }

}

?>

  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>

  <h1><?php echo $page_name;?></h1>


  <?php
    // loop over the errors, if there are any
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }

  ?>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <p><label>
      Name:<br/>

      <input type="text" name="name" value="<?php echo $name ?>"/>
    </label></p>

    <p><label>
      Email:<br/>

      <input type="text" name="email" value="<?php echo $email ?>"/>
    </label></p>

    <p><label>
      Password:<br/>

      <input type="password" name="password" value="<?php echo $password ?>"/>
    </label></p>


    <input type="submit" value="Submit"/>

  </form>


  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>