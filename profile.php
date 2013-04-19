<?php
/*
    File Name: profile.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The page that shows all the details of the current user's profile.
*/

 
$page_name = "My Profile";
include "functions/functions.php";
include 'partials/html_header.php';
?>
  <body id="<?php echo strtolower($page_name);?>">

  	<?php include 'partials/header.php'; ?>
  	
  	<div class="row">
		<div class="large-9 columns" role="content">

			<h3>
				<?php echo $page_name;?>
			</h3>
			<?php include 'partials/messages.php'; ?>
			<ul>
				<li>Name: <?php echo $logged_in_profile['name'];?></li>
				<li>Email: <?php echo $logged_in_profile['email'];?></li>
				<li><a href="edit_profile.php">Edit My Profile</a></li>
			</ul>
		</div>
		<?php include 'partials/sidebar.php' ?>
	</div>

  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>