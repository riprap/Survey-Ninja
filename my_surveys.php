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

$surveys = get_user_surveys($logged_in_profile['id']);
?>

<body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
  
  <div class="row">
    <div class="large-9 columns" role="content">
      <h3>
        <?php echo $page_name;?>
      </h3>
      <?php include 'partials/messages.php'; ?>

      <?php if (!empty($surveys)):?>

        <table>
          <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Facebook</th>
            <th>Email</th>
          </tr>
            <?php foreach ($surveys as $survey): 
                $questions = get_questions($survey['id']);
            ?>
                <tr>
                  <td>
                    <?php if (!empty($questions)) {?>
                      <a href="survey.php?survey=<?php echo $survey['id']; ?>">
                        <?php echo htmlentities($survey['name']); ?>
                      </a>
                    <?php }    
                    else { ?>
                      <a href="add_questions.php?survey=<?php echo $survey['id']; ?>">
                        <?php echo htmlentities($survey['name']); ?>
                      </a>
                   <?php } ?> 

                  </td>
                  <td>      
                    <a href="details.php?survey=<?php echo $survey['id']; ?>">
                      View
                    </a>
                  </td>
                  <td>      
                    <a href="edit_survey.php?survey=<?php echo $survey['id']; ?>">
                      Edit
                    </a>
                  </td>
                  <td>      
                    <a href="<?php echo $facebook_share_url . $site_url . "survey.php?survey=".$survey['id']; ?>">
                      <img src="images/facebook.png" alt="Share on Facebook" height="50" width="75">
                    </a>
                  </td>
                  <td>
                    <a href="email.php?survey=<?php echo $survey['id']; ?>">
                      Email
                    </a>
                  </td>

                </tr>
            <?php endforeach; //End of the foreach to loop through each of the surveys ?>
        </table>
      <?php
      else : ?>
        <p>You have not made any surveys yet.</p>
      <?php endif; //End of the if statement to check if the user has created any surveys?>
    </div>
  </div>
  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>