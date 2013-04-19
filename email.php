<?php 
/*
    File Name: email.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: Page that allows the user to send a link to their survey to someone via email
*/

$page_name = "Email Survey";
include "functions/functions.php";

//Including this partial will set the value of the $survey_number, $survey, $survey_type and $questions
include 'partials/get_survey.php'; 

$to_email = '';
$body = "Check out my ". $survey['name'] ." survey! ". $site_url . "survey.php?survey=".$survey_number;

//If the form has been submitted
if (!empty($_POST)) : 

  $to_email = $_POST['to_email'];
  $subject = "Check out my survey!";

  $from_email = $logged_in_profile['email'];
  $from_name = $logged_in_profile['name'];

  $body = $_POST['email_body'];
  $headers = "From: ".$from_name." <".$from_email.">\r\n" . "X-Mailer: php\n X-PHP-Script: ";

  if (empty($to_email)) :
    $errors[] = "Please enter an email address.";
  elseif ( !preg_match('/@.+\..+/', $to_email) ):
    $errors[] = "Please enter a valid email address.";
  endif;// End if to check if email is blank

  if (empty($body)) :
    $errors[] = "Email Body cannot be blank";
  endif; //End if to check if email is blank

  //There are no errors, attempt to send the email.
  if (empty($errors)) :
    if (mail($to_email, stripslashes($subject),stripslashes($body), $headers)) :
      set_message("success", "Email has been sent.");
	  header('Location: my_surveys.php');
    else :
      set_message("error", "Unable to send email.");
    endif;
  endif;

endif;

?>

<?php include 'partials/html_header.php'; ?>
  <body>

  <?php include 'partials/header.php'; ?>
    <div class="row">
      <div class="large-9 columns" role="content">
        <h3><?php echo $page_name;?></h3>
        <?php include 'partials/messages.php'; ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <label for "to_email">
            Email address:
          </label>
            <input type="text" name="to_email" value="<?php echo $to_email; ?>">
          </p>

          <label for "email_body">
            Email message:
          </label>
          <textarea name="email_body" cols=40 rows=6 ><?php echo $body; ?></textarea>

          <br/>
          <?php echo create_hidden_survey_id_field($survey['id']); ?>
          <input type="submit" name="send_email" value="Send Email" class="button">

        </form>
    </div>
    <?php include 'partials/sidebar.php' ?>
  </div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>