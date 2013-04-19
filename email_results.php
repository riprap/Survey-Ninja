<?php 
/*
    File Name: 
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description:  
*/

$page_name = "Email Results";
include "functions/functions.php";

//Including this partial will set the value of the $survey_number, $survey, $survey_type and $questions
include 'partials/get_survey.php'; 

$to_email = '';
$body = "Check out my ". $survey['name'] ." survey! ". $site_url . "survey.php?survey=".$survey_number;

$to_email = $logged_in_profile['email'];
$subject = "Survey Results";

$from_email ="surveys@scottandnolan.com";
$from_name = $site_name; 

$html = '';
foreach ($questions as $question): 
    $html .= "<li><strong>".htmlentities($question['text'])."</strong></li><ul>";
    $answers = get_answers($question['id']);
    foreach ($answers as $answer):
      $html.= "<li>".format_details_text($answer['text'], get_answer_count($answer['id'])). "</li>";
    endforeach; //end answers foreach 
    $html.= "</ul>";
endforeach; //end questions foreach

$body ='
        <html>
        <head>
          <title>Survey Results</title>
        </head>
        <body>
          <p>As requested, here are the results of your survey!</p>
          <ol>'. 
          $html
          .'</ol>
        </body>
        </html>
        ';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//There are no errors, attempt to send the email.
if (empty($errors)) :
  if (mail($to_email, stripslashes($subject),stripslashes($body), $headers)) :
    set_message("success", "An e-mail with these results has been sent to ". $to_email );  
  else :
    set_message("error", "Unable to send email.");
  endif;
    header('Location: details.php?survey='. $survey['id']);
    die;  
endif;

?>

<?php include 'partials/messages.php'; ?>