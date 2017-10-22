<?php
require_once 'class/event.php';
require_once 'config.php';

if(!(isset($_SESSION['user']['id']))){  //CHECKS IF THE USERS LOGGED IN CORRECTLY
  header('Location: index.php');
}

$event = new Event();
$event->dbConnect(conString,dbUser,dbPass);



?>
