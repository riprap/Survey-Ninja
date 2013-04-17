<!DOCTYPE html>
<!--
    File Name: register.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that allows the user to register for the system. 
-->

<?php 
$page_name = "Register";
include "functions/functions.php";
include 'partials/html_header.php'; 

$email = '';
$name = '';
$password = '';

// if the user submitted the form (with method="post")
if (!empty($_POST)) :

  if (empty($_POST['name'])) :
    $errors[] = "Please enter your name.";
  endif; //End if to check if name is blank

  if (empty($_POST['email'])) :
    $errors[] = "Please enter your email address.";
  elseif ( !preg_match('/@.+\..+/', $_POST['email']) ):
    $errors[] = "Please enter a valid email address.";
  endif;// End if to check if email is blank

  if (empty($_POST['password'])) :
    $errors[] = "Please enter your password.";
  endif; // End if to check if the password field is blank

  //If there are no validation errors attempt to save the user to the database.
  if (empty($errors)) :
      //Search for the email in the database 
       if (check_user_exists($_POST['email'])) :
          $errors[] = "That email address is already in use.";
          $name = $_POST['name'];
          $password = $_POST['password'];
      else :
        add_user($_POST['name'], $_POST['email'], $_POST['password']);
        header("Location: index.php");
      endif; //End of if statement to check if email address is in use
  else :
    //There is an error on the page. Maintain sticky variables.
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
  endif; //End of the if statement to check if there are validation errors on the form.
endif; //End of the if statement dealing with submitting the form

?>

  <body id="<?php echo strtolower($page_name);?>">

    <?php include 'partials/header.php'; ?>

    <h1><?php echo $page_name;?></h1>

    <?php include 'partials/messages.php'; ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

      <p>
        <label>
          Name:<br/>
          <input type="text" name="name" value="<?php echo $name ?>"/>
        </label>
      </p>

      <p>
        <label>
          Email:<br/>
          <input type="text" name="email" value="<?php echo $email ?>"/>
        </label>
      </p>

      <p>
        <label>
          Password:<br/>
          <input type="password" name="password" value="<?php echo $password ?>"/>
        </label>
      </p>

      <input type="submit" value="Submit"/>

    </form>


    <?php include 'partials/footer.php'; ?>
  
  </body>
</html>