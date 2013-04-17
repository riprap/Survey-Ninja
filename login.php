<?php
/*
    File Name: login.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The login page of the survey site.
*/
$page_name = "Login";
include "functions/functions.php";


$email = '';
$password = '';
$errors = array();

// if the user submitted the form (with method="post")
if (!empty($_POST)) {	
	if (empty($_POST['email'])) {
		$errors[] = "Please enter your email address.";
	}
	if (empty($_POST['password'])) {
		$errors[] = "Please enter your password.";
	}

	//If there are no validation errors attempt to validate the user
	if (empty($errors)) {
		//Search for the email in the database 
		$exists = check_user_exists ($_POST['email']);
		if ($exists) {
			$user_match = check_password_correct($_POST['email'], $_POST['password']);
			if ($user_match) //log our homie in!
			{
				$_SESSION['id'] = $user_match;
				header('Location: index.php');
			}
			else{
				$errors[] = "Invalid username/password combination";
			}
		}
		else 
		{
			$errors[] = "That user doesn't exist!";
			$email = $_POST['email'];
		}
	}
	else {
		//There is an error on the page. Maintain sticky variables.
		$email = $_POST['email'];
	}
}


include 'partials/html_header.php'; 
?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
    <?php include 'partials/messages.php'; ?>
  <h1>
    <?php echo $page_name;?>
  </h1>
  
  
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  	<label>E-mail: </label><br/>
   	<input type="text" name="email"><br/>
   	<label>Password: </label><br/>
   	<input type="password" name="password">
   	<input type="submit" value="Login">
  </form>
  <p>New user? Register now to create and manage surveys!</p>
  <a href="register.php" id="register">Register</a>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>