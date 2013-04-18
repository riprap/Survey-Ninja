<?php 
/*
    File Name: details.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The survey details page that shows all of the details of a specific survey.
*/
 
$page_name = "Survey Details";
include "functions/functions.php";
include 'partials/html_header.php'; 

if (!empty($_POST)) {
  $survey_number = $_POST['survey_id'];
}
else if (!empty($_GET['survey'])) {
  $survey_number = $_GET['survey'];
}
else{
  set_message("error", "No survey selected!");
  header("Location:list_surveys.php");
  die;
}
$survey = get_survey($survey_number);
$survey_type = $survey['survey_type'];
$survey['question_count'];
$questions = get_questions($survey_number);

?>
  <body id="<?php echo strtolower($page_name);?>">
    <?php include 'partials/header.php'; ?>
    <div class="row">
      <div class="large-9 columns" role="content">


        <h3>
        Survey Details
        </h3>
        <h3>
          "<?php echo $survey['name']; ?>"
        </h3>
	    <h4>
	      Total Submissions:
	      <?php 
	        echo get_submission_count($survey['id']);
	      ?>
	    </h4>
        
        <ol>
          <?php 
          foreach ($questions as $question): 
          ?>
            <li><strong><?php echo htmlentities($question['text']) ?></strong></li>
            <ul>
            <?php
              $answers = get_answers($question['id']);
              foreach ($answers as $answer): ?>
                <li id="answer">
                  <?php echo format_details_text($answer['text'], get_answer_count($answer['id']));?>
                </li>
        <?php endforeach; //end answers foreach ?>
            </ul>
        <?php endforeach; //end questions foreach?>
       </ol>
    </div>
  </div>
<?php  include 'partials/footer.php'; 
  ?>
  
  </body>
</html>