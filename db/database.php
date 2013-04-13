<?php
/*
    File Name: database.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file connects to the database.
*/
@mysql_connect('localhost', 'root', '')
  or die('Unable to connect to database');

@mysql_select_db('survey')
  or die('Unable to select survey');
