<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the sitee which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "Home";
include "functions/functions.php";
include 'partials/html_header.php'; 
//$logged_in_profile = get_profile();

if (!empty($_POST)) {
  $survey_number = $_POST['survey_id'];
}
else if (!empty($_GET['survey'])) {
  $survey_number = $_GET['survey'];
}
// else if no survey. DIE

// if the user submitted the form (with method="post")
if (!empty($_POST)) {
}


$survey = get_survey($survey_number);
$survey_type = $survey['survey_type'];

?>
  <body id="<?php echo strtolower($page_name);?>">

  <?php include 'partials/header.php'; ?>
  <h1>Adding Questions for Survey: <? echo $survey['name']; ?> </h1>
  <p>This is a <? echo $survey_type; ?> survey. Each question must be filled in and include four possible answers.</p>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <?php if ($survey_type == 'multiple_choice') {?>
      <?php for ($i=1; $i <= 5; $i++){ ?>
        <p>
          <label>
            Question #<?php echo $i;?>:<br/>
            <input type="text" name="question_<?php echo $i;?>" value=""/>
          </label>
          
          <?php foreach(range('A','D') as $d) { ?>
            <br/>
            <label>
              Answer <? echo $d;?>:<br/>
              <input type="text" name="question_<?php echo $i;?>_answer_<?php echo $d;?>" value=""/>
            </label>        
          <?php } ?>

        </p>
      <?php }?>
    <?php }?>
    <input type="hidden" name="survey_id" value=<? echo $survey['id']; ?> />

    <input type="submit" value="Submit"/>

  </form>  

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>