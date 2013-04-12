<?php

require "functions.php";

$email = '';
$name = '';
$password = '';
$errors = array();
$success = false;


// if the user submitted the form (with method="post")
if (!empty($_POST)) {
	// if the email field is empty
	if (empty($_POST['email'])) {
		$errors[] = "Please enter your email address.";
	}

	else if ( !preg_match('/@.+\..+/', $_POST['email']) ) {
		$errors[] = "Please enter a valid email address.";
	}

	else {
				// this function searches for the email in the database
				$check_email= check_user_exists ($_POST['email']);

				 if (!$check_email) {
			 			$errors[] = "That email address is not associated with an account.";

 				}
	}

	if (empty($_POST['password'])) {
		$errors[] = "Please enter your password.";
	}


	// if there are no errors
	if (empty($errors)) {

					$check_password = check_password_correct($_POST['email'], md5($_POST['password']));
					if ($check_password){
						$_SESSION['email'] = $_POST['email'];
							header('Location: index.php');

							die;
						}
					else {
						$errors[] = "Incorrect password.";
						$email = $_POST['email'];
						}

	}
	else {
		// must be an error. use this in the form below
		$email = $_POST['email'];
		$password = $_POST['password'];
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href ="css/css.css"/>


</head>

<body>
<div id="links">
	<p>
	<a href="register.php">Register</a></p>
</div>
<h1>Login</h1>



<?php

	// loop over the errors, if there are any
	foreach ($errors as $error) {
		echo "<p>$error</p>";
	}

?>
<?php

if (isset($_SESSION['logout'])) {
			echo "You have been logged out.";
			 unset($_SESSION['logout']);

	}


?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<p>
	<label>
		Email:

		<input type="text" name="email" value="<?php echo $email ?>"/>
	</label>

	<label>
			Password:

			<input type="password" name="password" value="<?php echo $password ?>"/>
	</label>
		<input type="submit" value="Login"/>
	</p>

</form>

</body>

</html>

