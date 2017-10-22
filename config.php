<?php
session_start();
define('conString', 'mysql:host=localhost;dbname=alphasierra_db');
define('dbUser', 'root');
define('dbPass', '');


define('userfile', 'user.php');
define('loginfile', 'login.php');


//template index files
define('indexHead', 'inc/indexhead.html');
define('indexTop', 'inc/indextop.html');
define('indexMiddle', 'inc/indexmiddle.php');
define('indexFooter', 'inc/indexfooter.html');

//template dashboard

define('userPage', 'dashboard.php');
define('userProfile', 'inc/userinfo.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = new User();
$user->dbConnect(conString, dbUser, dbPass);
