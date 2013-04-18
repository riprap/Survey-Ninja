<!DOCTYPE html>
<!--
    File Name: index.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The index / home page of the site which displays an introduction and links to other 
    sections of the site. 
-->

<?php 
$page_name = "Home";
include "functions/functions.php";

if (empty($_SESSION['id'])){
  set_message("error", "You must be logged in to access this page.");
  header('Location: login.php');
  die;
}

include 'partials/html_header.php'; 

?>
  <body id="<?php echo strtolower($page_name);?>">

	<?php include 'partials/header.php'; ?>
	<?php include 'partials/messages.php'; ?>
	<div class="row">
		<div class="large-9 columns" role="content">
			<h3>
				<?php echo $page_name;?>
			</h3>
			<ul>
				<li><a href="create_survey.php">Create a Survey</a></li>
				<li><a href="my_surveys.php">View your Surveys</a></li>
				<li><a href="list_surveys.php">Take a Survey</a></li>
				<li><a href="profile.php">View your Profile.</a></li>
			</ul>
		</div>
	</div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>