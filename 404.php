<?php
/*
    File Name: 404.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Ninja
    File Description: 404 page. 
*/
 
$page_name = "404 Error: Page Not Found";
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
      <p>
      	We are sorry about the error. We are looking into what 
      	caused the problem to better serve our users. Use the
      	links above to navigate back through the site.
      	Thanks for your patience.
      </p>
  	</div>
  	<?php include 'partials/sidebar.php'; ?>
  </div>
  <?php include 'partials/footer.php'; ?>
  
  </body>
</html>