<?php
/*
    File Name: select_month.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: The navbar that a user will see if they are logged into the site.
*/  
?>
<select name="survey_type[]">
    <?php 
    $types = get_survey_types();
    foreach ($types as $type) {
    ?>
      <option value="<?php echo $type['id'];?>"><?php echo $type['name'];?></option>
    <?php 
    } 
    ?>
</select>
