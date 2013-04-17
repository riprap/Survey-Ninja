<?php 
/*
    File Name: my_surveys.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page to list all of the surveys a user has created and show details for each one.
*/

$page_name = "My Surveys";
include "functions/functions.php";
include 'partials/html_header.php'; 
if (empty($_SESSION['id'])){
	header('Location: login.php');
  die;
}
$logged_in_profile = get_user($_SESSION['id']);
$surveys = get_user_surveys($logged_in_profile['id'])
?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
  <h1>
    <?php echo $page_name;?>
  </h1>

  <table>
    <tr>
      <th>Name</th>
      <th>Survey Type</th>
      <th>Number of Questions</th>
      <th>Start Date</th>
      <th>End Date</th>
      <!--<th>Email</th>-->
      <th>Submissions</th>
      <!--<th>URL</th>
      <th>Edit</th>-->
      <th>Details</th>
    </tr>
  <?php foreach ($surveys as $survey): 
    $questions = get_questions($survey['id']);
  ?>
    <tr>
      <td>      
        <a href="survey.php?survey=<?php echo $survey['id']; ?>">
          <?php echo htmlentities($survey['name']); ?>
        </a>
      </td>
      <td>
        <?php echo $survey['survey_type'];?>
      </td>
      <td>
        <?php 
        if (!empty($questions)) :
          echo count($questions);
        else: ?>                
          <a href="add_questions.php?survey=<?php echo $survey['id']; ?>">
            <?php echo count($questions); ?>
          </a>          
        <?php 
        endif; //End the if statement to provide the url to add questions if the survey has no questions         
        ?>
      </td>
       <td>
        <?php 
          if (!empty($survey['start_date'])){
            echo format_date($survey['start_date']);
          }
        ?>
      </td>
      <td>
        <?php 
          if (!empty($survey['end_date'])){
            echo format_date($survey['end_date']);
          }
        ?>
      </td> 
      <!--<td>
        Link to email page
      </td>-->
      <td>
        <?php 
          echo get_submission_count($survey['id']);
        ?>
      </td> 
      <td>      
        <a href="details.php?survey=<?php echo $survey['id']; ?>">
          <?php echo htmlentities($survey['name']); ?>
        </a>
      </td>                             
    </tr>
  <?php endforeach; //End of the foreach to loop through each of the surveys ?>

  </table>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>