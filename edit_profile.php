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
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
  <?php include 'partials/messages.php'; ?>
  
  <h1>
    <?php echo $page_name;?>
  </h1>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="name">
      Name:
    </label>
    <input name="name" value="<?php echo htmlentities($logged_in_profile['name']) ?>"/>
    <br>
    <label for="email">
      Email:
    </label>
    <input name="email" value="<?php echo htmlentities($logged_in_profile['email']) ?>"/>
    <p><input type="submit" value="Save Profile"/></p>
  </form>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>