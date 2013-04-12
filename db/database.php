<?php
/*
    File Name: database.php
    Authors Name: Scott Montgomery and Nolan Knill
    Web Site Name: Survey Site
    File Description: This file connects to the database.



define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
*/
@mysql_connect('localhost', 'root', '')
  or die('Unable to connect to database');

@mysql_select_db('portfolio')
  or die('Unable to select portfolio');
;