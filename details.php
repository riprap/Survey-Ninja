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
  <body>
    <?php include 'partials/header.php'; ?>
    <div class="row">
      <div class="large-9 columns" role="content">
        <h3>
          <?php echo $survey['name']; ?>
        </h3>
        <table>
        	<tr>
        		<th>Survey Type</th>
        		<th>Start Date</th>
        		<th>End Date</th>
        		<th>Total Submissions</th>
        	</tr>
        	<tr>
        		<td>
        			<?php echo $survey_type; ?>
        		</td>
        		<td>
        			<?php echo format_date($survey['start_date']);?>
        		</td>
        		<td>
        			<?php echo format_date($survey['end_date']); ?>
        		</td>
        		<td>
        			<?php echo get_submission_count($survey['id']);?>
        		</td>
        	</tr>
        </table>
        <a href="<?php echo $facebook_share_url . $site_url . "survey.php?survey=".$survey['id']; ?>">
            <img src="images/facebook.png" alt="Share on Facebook" id="fb_share">
        </a>
        <a href="email.php?survey=<?php echo $survey['id']; ?>">
            Email This Survey 
        </a>
		<hr/>
		<h4>
			Results
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
    <?php include 'partials/sidebar.php' ?>
  </div>
<?php  include 'partials/footer.php'; ?>
  
  </body>
</html>