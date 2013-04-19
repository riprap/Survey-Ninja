<?php
/*
    File Name: edit_profile.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The edit profile page that allows a user to edit their profile.
*/

$page_name = "Edit Profile";
include "functions/functions.php";

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

  if (empty($errors)) :
    if (check_user_exists($_POST['email']) && $_POST['email'] != $logged_in_profile['email']) :
      set_message("error", "This email address is already in use.");
    else:
      set_message("success", "Profile has been updated.");
      update_user($logged_in_profile['id'], $_POST['name'], $_POST['email']);      
    endif; //End of if statement to check if email address is in use    
  endif; //End of if statement to update user

endif;
?>

<?php include 'partials/html_header.php'; ?>
  <body>

  <?php include 'partials/header.php'; ?>
    	
  	<div class="row">
		<div class="large-9 columns" role="content">
			<h3>
				<?php echo $page_name;?>
			</h3>
			
			<?php include 'partials/messages.php'; ?>

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    			
    			<label>
      				Name
    			</label>
    			<input type="text" name="name" value="<?php echo htmlentities($logged_in_profile['name']); ?>">
    			
    			<label>
      				Email
    			</label>
    			<input type="text" name="email" value="<?php echo htmlentities($logged_in_profile['email']); ?>">
				
				<input type="submit" value="Save Profile" class="button">
			</form>
		</div>
		<?php include 'partials/sidebar.php' ?>
	</div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>