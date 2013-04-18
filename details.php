<?php 
/*
    File Name: details.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The survey details page that shows all of the details of a specific survey.
*/
 
$page_name = "Survey Details";
include "functions/functions.php";

//Including this partial will set the value of the $survey_number, $survey, $survey_type and $questions
include 'partials/get_survey.php'; 
?>

<?php include 'partials/html_header.php'; ?>
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
          Survey Type:
          <?php echo $survey_type; ?>
        </h4>
        <h4>
          Start Date:
          <?php echo format_date($survey['start_date']); ?>
        </h4>
        <h4>
          End Date:
          <?php echo format_date($survey['end_date']); ?>
        </h4> 
        <h4>
          Total Submissions:
          <?php 
            echo get_submission_count($survey['id']);
          ?>
        </h4>

        <h4> 
          <a href="email.php?survey=<?php echo $survey['id']; ?>">
            Email This Survey
          </a>         
        </h4> 
        <h4>    
          <a href="<?php echo $facebook_share_url . $site_url . "survey.php?survey=".$survey['id']; ?>">
            Share on Facebook
          </a>
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
<?php  include 'partials/footer.php'; ?>
  
  </body>
</html>